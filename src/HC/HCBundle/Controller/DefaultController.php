<?php

namespace HC\HCBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('HCHCBundle::ejemplopagina.html.twig');
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
