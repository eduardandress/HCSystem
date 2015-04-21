<?php

namespace HC\HCBundle\Entity;


use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\ORM\Event\LifecycleEventArgs;
use HC\HCBundle\Entity;
use Symfony\Component\Validator\Constraints\DateTime;
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
        $datosBitacora["Descripcion"]=$datosBitacora['Idusuario']->getUsuario()." agregó ".$datosBitacora["Tabla"]." ".$this->obtenerDescripcionSegunTabla($datosBitacora["entity"]);
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
        $descripcionMod= $datosBitacora['Idusuario']->getUsuario()." actualizó ".$datosBitacora["Tabla"]." .Modificaciones en= ";
        foreach ($this->ModificacionesEntidad as $atributo => $valor) {
           $descripcionMod.=  $atributo. ": [Valor anterior=".json_encode($valor[0])."], ";
        }
        $datosBitacora["Descripcion"]= $descripcionMod;
        $this->RegistrarEnBitacora($datosBitacora);
           
    }
    private function obtenerNombreClase($entidad){
        $nombreEntidad= get_class($entidad);
        $string="HC\\HCBundle\\Entity\\";
        $nombreEntidad=str_replace($string,"",$nombreEntidad);

        return $nombreEntidad;
    }
    private function obtenerDescripcionSegunTabla($entity){
        $tabla= $this->obtenerNombreClase($entity);
        $descripcion="  ";

            //     echo "el nombre de la tabla es".$tabla;
            //     echo $adsd;
            // if($tabla=="Cita"){
                
            // }
            switch($tabla){
                case "Cita":
                $fecha = $entity->getFechaprogramada()->format('Y-m-d');;
                $descripcion=" del paciente ".$entity->getIdpaciente()->getNombre()." ".$entity->getIdpaciente()->getApellido()." para el dia ". $fecha;
                break;
                case "Usuario":
                    $descripcion=". Nombre de usuario ".$entity->getUsuario()." Nombre: ".$entity->getNombre()." con rol de ".$entity->getIdrol()->getNombre();
                break;
                case "Pactelf":
                    $descripcion=". para el paciente ".$entity->getIdpaciente()->getNombre()." ".$entity->getIdpaciente()->getApellido().". Número: ".$entity->getNumero();
                break;
                case "Pacnumcontacto":
                 $descripcion=". para el paciente ".$entity->getIdpaciente()->getNombre()." ".$entity->getIdpaciente()->getApellido().". Contacto:  ".$entity->getNombrecontacto()." ".$entity->getApellidocontacto()." . Número: ".$entity->getNumero();
                break;
                case "Visita":
                    $descripcion=". para el paciente ".$entity->getIdpaciente()->getNombre()." ".$entity->getIdpaciente()->getApellido();
                break;
                case "Paciente":
                       $descripcion=". Cédula: ".$entity->getCedula()."  ".$entity->getNombre()." ".$entity->getApellido();
                break;
                case "Diagnostico":
                    $pacienteNombre=$entity->getIdnotacita()->getIdhci()->getIdpaciente()->getNombre();
                    $pacienteApellido=$entity->getIdnotacita()->getIdhci()->getIdpaciente()->getApellido();
                    $cita=$entity->getIdnotacita()->getIdcita()->getFechaprogramada()->format('Y-m-d');
                       $descripcion=" para el paciente ".$pacienteNombre." ".$pacienteApellido." a su cita programada para el dia: ".$cita ;
                break;
                case "Prescripcion":
                  $pacienteNombre=$entity->getIdnotacita()->getIdhci()->getIdpaciente()->getNombre();
                    $pacienteApellido=$entity->getIdnotacita()->getIdhci()->getIdpaciente()->getApellido();
                    $cita=$entity->getIdnotacita()->getIdcita()->getFechaprogramada()->format('Y-m-d');
                       $descripcion=" para el paciente ".$pacienteNombre." ".$pacienteApellido." a su cita programada para el dia: ".$cita ;
                break;
                case "Referencia":
                  $pacienteNombre=$entity->getIdnotacita()->getIdhci()->getIdpaciente()->getNombre();
                    $pacienteApellido=$entity->getIdnotacita()->getIdhci()->getIdpaciente()->getApellido();
                    $cita=$entity->getIdnotacita()->getIdcita()->getFechaprogramada()->format('Y-m-d');
                       $descripcion=" para el paciente ".$pacienteNombre." ".$pacienteApellido." a su cita programada para el dia: ".$cita ;
                break;
                case "Notacita":
                        $pacienteNombre=$entity->getIdhci()->getIdpaciente()->getNombre();
                    $pacienteApellido=$entity->getIdhci()->getIdpaciente()->getApellido();
                     $cita=$entity->getIdcita()->getFechaprogramada()->format('Y-m-d');
                     $descripcion=" para el paciente ".$pacienteNombre." ".$pacienteApellido." a su cita programada para el dia: ".$cita ;
                break;
                case "Phcialergia":
                     $pacienteNombre=$entity->getIdhci()->getIdpaciente()->getNombre();
                    $pacienteApellido=$entity->getIdhci()->getIdpaciente()->getApellido();
                     $descripcion=" del paciente ".$pacienteNombre." ".$pacienteApellido;
                break;
                case "Phcimedicamento":
                  $pacienteNombre=$entity->getIdhci()->getIdpaciente()->getNombre();
                    $pacienteApellido=$entity->getIdhci()->getIdpaciente()->getApellido();
                     $descripcion=" del paciente ".$pacienteNombre." ".$pacienteApellido;
                break;
                case "Phcicondicion":
                  $pacienteNombre=$entity->getIdhci()->getIdpaciente()->getNombre();
                    $pacienteApellido=$entity->getIdhci()->getIdpaciente()->getApellido();
                     $descripcion=" del paciente ".$pacienteNombre." ".$pacienteApellido;
                break;
                case "Phciconsumo":
                  $pacienteNombre=$entity->getIdhci()->getIdpaciente()->getNombre();
                    $pacienteApellido=$entity->getIdhci()->getIdpaciente()->getApellido();
                     $descripcion=" del paciente ".$pacienteNombre." ".$pacienteApellido;
                break;
                case "Hci":
                  $pacienteNombre=$entity->getIdpaciente()->getNombre();
                    $pacienteApellido=$entity->getIdpaciente()->getApellido();
                     $descripcion="(Historia Clinica Inical) del paciente ".$pacienteNombre." ".$pacienteApellido;
                break;              
            }
            return $descripcion;
    }
    public function preRemove(LifecycleEventArgs $args)
    {
        $evento= $args;
        $datosBitacora= $this->ObtenerDatosDelEvento($evento,3);

           $datosBitacora["Descripcion"]=$datosBitacora['Idusuario']->getUsuario()." eliminó en ".$datosBitacora["Tabla"]." ".$datosBitacora["Idtupla"];
        $this->RegistrarEnBitacora($datosBitacora);
    
    }
    private function ObtenerDatosDelEvento($evento,$idtipoAccion){

        $entity = $evento->getEntity();
        $entityManager = $evento->getEntityManager();
         $nombreEntidad=$this->obtenerNombreClase($entity);
        // $nombreEntidad= get_class($entity);
        // $string="HC\\HCBundle\\Entity\\";
        // $nombreEntidad=str_replace($string," ",$nombreEntidad);
 
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