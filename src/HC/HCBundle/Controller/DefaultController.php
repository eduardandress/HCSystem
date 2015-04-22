<?php

namespace HC\HCBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    public function indexAction()
    {
        //Consultas del dasboard
        $em=$this->getDoctrine()->getManager();
        $config = $em->getConfiguration();
        $config->addCustomNumericFunction('MONTH', 'DoctrineExtensions\Query\Mysql\Month');
         $config->addCustomNumericFunction('YEAR', 'DoctrineExtensions\Query\Mysql\Year');

       
        $citasParahoy=$em->getRepository('HCHCBundle:Cita')->findBy(array(
                                            'fechaprogramada'=> date_create(date("Y-m-d"))
                                                                    )
                                                            );
        $cantCitasParahoy=sizeof($citasParahoy);
        $hoy=date("Y-m-d");
        $sevendias=date("Y-m-d",strtotime($hoy.' + 6 days'));
        $query = $em->createQuery("SELECT u FROM HCHCBundle:Cita u WHERE u.fechaprogramada >='".$hoy."' AND u.fechaprogramada <='".$sevendias."'");
         $citas7dias =  $query->getResult();
         $cantCitas7Dias=sizeof($citas7dias);

         
         $query = $em->createQuery("SELECT u FROM HCHCBundle:Cita u WHERE MONTH(u.fechaprogramada)=MONTH('".$hoy."') AND YEAR(u.fechaprogramada)=YEAR('".$hoy."')");
         $citasEsteMes =  $query->getResult();
         $cantCitasEsteMes=sizeof($citasEsteMes);

        return $this->render('HCHCBundle::ejemplopagina.html.twig',array(
            'citasParahoy' =>$citasParahoy,
            'citas7dias' =>$citas7dias,
            'citasEsteMes' =>$citasEsteMes,


        ));
    }
    //Funcion que verifica si un paciente existe dado la cedula
    //Se usa en la creacion y edicion de citas e historias clinicas por ajax
    public function existepacienteAction(Request $request,$cedula){
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('HCHCBundle:Paciente')->findOneByCedula($cedula);

        if($entity){
            return new JsonResponse(array('respuesta' =>"Verdadero" ));
        }else{
            return new JsonResponse(array('respuesta' => "Falso"));
       }
    }
}
