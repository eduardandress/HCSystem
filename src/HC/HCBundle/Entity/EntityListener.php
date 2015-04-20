<?php

namespace HC\HCBundle\Entity;


use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\ORM\Event\LifecycleEventArgs;
use HC\HCBundle\Entity;

class EntityListener
{

   
    protected $container;
    private $ModificacionesEntidad;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }
    public function postPersist(LifecycleEventArgs $args)
    {
        $evento= $args;   
        $datosBitacora= $this->ObtenerDatosDelEvento($evento,1);
        $this->RegistrarEnBitacora($datosBitacora); 
       
    }
    public function preUpdate(\Doctrine\ORM\Event\PreUpdateEventArgs $eventArgs)
    {      
             $this->ModificacionesEntidad = $eventArgs->getEntityChangeSet();
             
    }
    public function postUpdate(LifecycleEventArgs $args)
    {
        $evento= $args;
        $datosBitacora= $this->ObtenerDatosDelEvento($evento,2);
        //Se coloca en descripcion los campos que se modificaron;
        $descripcionMod= "Modificaciones en= ";
        foreach ($this->ModificacionesEntidad as $atributo => $valor) {
           $descripcionMod.=  $atributo. ": [anterior valor=".json_encode($valor[0])."], ";
        }
        $datosBitacora["Descripcion"]= $descripcionMod;
        $this->RegistrarEnBitacora($datosBitacora);
           
    }
    public function preRemove(LifecycleEventArgs $args)
    {
        $evento= $args;
        $datosBitacora= $this->ObtenerDatosDelEvento($evento,3);
        $this->RegistrarEnBitacora($datosBitacora);
    
    }
    private function ObtenerDatosDelEvento($evento,$idtipoAccion){

        $entity = $evento->getEntity();
        $entityManager = $evento->getEntityManager();
        $nombreEntidad= get_class($entity);
        //usuario logeado que realizo el evento
        $usuario = $this->container
                        ->get('security.context')
                        ->getToken()
                        ->getUser();
        //Instancia del objeto con dicho id               
        $idTipoAccion= $entityManager
                      ->getRepository('HCHCBundle:Tipoaccion')
                      ->find($idtipoAccion);
        //arreglo con todos los datos;
                      
        $datos= array(
            "Tabla"=> $nombreEntidad,
            "Idtupla"=> $entity->getId(),
            "Descripcion"=> null,
            "Idusuario"=> $usuario,
            "Idtipoaccion"=> $idTipoAccion,
            "em"=>$entityManager,
            "entity"=> $entity,
        );


        return $datos;
    }
 
    private function RegistrarEnBitacora($datos){
            /* 
               Comprobar que el evento no escuche cualquiera Insercion,mod,elim de Bitacora.
               porque se quedaria en un ciclo infinito
            */
           if(! ($datos["entity"] instanceof Bitacora) ){

                $bitacora= new Bitacora();
                $bitacora->setTabla($datos["Tabla"]);
                $bitacora->setIdtupla($datos["Idtupla"]);
                $bitacora->setDescripcion($datos["Descripcion"]);
                $bitacora->setIdusuario($datos["Idusuario"]);
                $bitacora->setIdtipoaccion($datos["Idtipoaccion"]);

                
                $em= $datos["em"];
                $query= $em->persist($bitacora);
                 $em->flush();
           }
           
      
    }

}