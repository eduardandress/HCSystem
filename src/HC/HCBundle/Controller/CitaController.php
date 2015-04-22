<?php

namespace HC\HCBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

use HC\HCBundle\Entity\Cita;
use HC\HCBundle\Form\CitaType;
use Symfony\Component\HttpFoundation\Response;
/**
 * Cita controller.
 *
 */
class CitaController extends Controller
{

    /**
     * Lists all Cita entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HCHCBundle:Cita')->findAll();

        return $this->render('HCHCBundle:Cita:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Cita entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Cita();
        $UsuarioLogeado=$this->get('security.context')->getToken()->getUser();
        $entity->setIdusuario($UsuarioLogeado); //Solo en la creacion de una nueva cita se coloca el id del Usuario logeado, no se ṕuede editar.
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
         $cedula=$form->get('cedula')->getData();
         $em= $this->getDoctrine()->getManager();
         $pacienteConCedula= $em->getRepository('HCHCBundle:Paciente')->findOneByCedula($cedula);
       // echo $pacienteConCedula->getCedula();
            $pacienteExiste=true;
            if($pacienteConCedula==null){
                $pacienteExiste=false;
            }
        if ($form->isValid()&& $pacienteExiste) {
            $entity->setIdpaciente($pacienteConCedula);
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                    'mensaje',
                    'Se ha agregado la cita  exitosamente'
            );
            return $this->redirect($this->generateUrl('gestionarcitas_show', array('id' => $entity->getIdcita())));
        }

        return $this->render('HCHCBundle:Cita:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Cita entity.
     *
     * @param Cita $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Cita $entity)
    {
        $form = $this->createForm(new CitaType(), $entity, array(
            'action' => $this->generateUrl('gestionarcitas_create'),
            'method' => 'POST',
        ));
    
        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new Cita entity.
     *
     */
    public function newAction()
    {
        $entity = new Cita();
        $form   = $this->createCreateForm($entity);

        return $this->render('HCHCBundle:Cita:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Cita entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HCHCBundle:Cita')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cita entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HCHCBundle:Cita:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Cita entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HCHCBundle:Cita')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cita entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HCHCBundle:Cita:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Cita entity.
    *
    * @param Cita $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Cita $entity)
    {
    
      
        $paciente=$entity->getIdpaciente();
        $form = $this->createForm(new CitaType(), $entity, array(
            'action' => $this->generateUrl('gestionarcitas_update', array('id' => $entity->getIdcita())),
            'method' => 'PUT',
        ));
        $form->get('cedula')->setData($paciente->getCedula());
        $form->add('submit', 'submit', array('label' => 'Actualizar','attr'=>array('class'=>'btn btn-default enviar')));

        return $form;
    }
    /**
     * Edits an existing Cita entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HCHCBundle:Cita')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cita entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        $cedula=$editForm->get('cedula')->getData();
         $em2= $this->getDoctrine()->getManager();
        $pacienteConCedula= $em2->getRepository('HCHCBundle:Paciente')->findOneByCedula($cedula);
      
            $pacienteExiste=true;
            if($pacienteConCedula==null){
                $pacienteExiste=false;
            }
        if ($editForm->isValid() && $pacienteExiste) {
            $entity->setIdpaciente($pacienteConCedula);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                    'mensaje',
                    'Se ha modificado la cita  exitosamente'
            );
            return $this->redirect($this->generateUrl('gestionarcitas_edit', array('id' => $id)));
        }

        return $this->render('HCHCBundle:Cita:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Cita entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HCHCBundle:Cita')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Cita entity.');
            }

            $em->remove($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                    'mensaje',
                    'Se ha eliminado la cita  exitosamente'
            );
        }

        return $this->redirect($this->generateUrl('gestionarcitas'));
    }

    /**
     * Creates a form to delete a Cita entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('gestionarcitas_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit2', 'submit', array('label' => 'Eliminar','attr'=>array('class'=>'btn btn-default ')))
            ->getForm()
        ;
    }
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
