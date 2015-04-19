<?php

namespace HC\HCBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use HC\HCBundle\Entity\Notacita;
use HC\HCBundle\Form\NotacitaType;

use HC\HCBundle\Entity\Prescripcion;
use HC\HCBundle\Entity\Diagnostico;
use HC\HCBundle\Entity\Referencia;

use HC\HCBundle\Form\PrescripcionType;
use HC\HCBundle\Form\DiagnosticoType;
use HC\HCBundle\Form\ReferenciaType;
/**
 * Notacita controller.
 *
 */
class NotacitaController extends Controller
{

    /**
     * Lists all Notacita entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HCHCBundle:Notacita')->findAll();

        return $this->render('HCHCBundle:Notacita:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Notacita entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Notacita();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

             if($form->isSubmitted()){
                    if ($form->isValid()) {
                        $prescripciones= $entity->getPrescripcion();
                        $diagnosticos= $entity->getDiagnostico();
                        $referencias= $entity->getReferencia();

                      //Se asigna el usuario (medico) al que pertenecen las prescripciones, referencias y diagnosticos
                     $UsuarioLogeado=$this->get('security.context')->getToken()->getUser();
                    
                        $entity->setPrescripcion($prescripciones,$UsuarioLogeado);
                        $entity->setDiagnostico($diagnosticos,$UsuarioLogeado);
                        $entity->setReferencia($referencias,$UsuarioLogeado);
                    
                        $em = $this->getDoctrine()->getManager();
                        $em->persist($entity);
                        $em->flush();
                        //return $this->redirect($this->generateUrl('notacita_show', array('id' => $entity->getId())));
                        return $this->redirect($this->getRequest()->headers->get('referer'));
                    }
                }

        return $this->render('HCHCBundle:Notacita:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Notacita entity.
     *
     * @param Notacita $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Notacita $entity)
    {
             //se crean variables de prescripcion, diagnostico y referencia 
          $prescripciones= $entity->getPrescripcion();
          $diagnosticos= $entity->getDiagnostico();
          $referencias= $entity->getReferencia();
           //Luego se anexan a la instacia nueva de nota cita

          if(!$prescripciones->isEmpty()){
           
            $NuevoP = new Prescripcion();
            $entity->addPrescripcion($NuevoP);

          }
          if(!$diagnosticos->isEmpty()){
                $NuevoD = new Diagnostico();
               $entity->addDiagnostico($NuevoD);
              
          }
          if(!$referencias->isEmpty()){
            $NuevoR = new Referencia();
           $entity->addReferencia($NuevoR);
              
          }

       
        

        $form = $this->createForm(new NotacitaType(), $entity, array(
            'action' => $this->generateUrl('notacita_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Notacita entity.
     *
     */
    public function newAction()
    {
        $entity = new Notacita();
        $form   = $this->createCreateForm($entity);

        return $this->render('HCHCBundle:Notacita:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),

        ));
    }

    /**
     * Finds and displays a Notacita entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HCHCBundle:Notacita')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Notacita entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        //Se obtienen la prescripcion, diagnostico y referencia de la nota de cita;
        $prescripciones=$entity->getPrescripcion();
        $referencias=$entity->getReferencia();
        $diagnosticos=$entity->getDiagnostico();

        // se pasan los formualarios d eliminacion de Prescripciones, referencias y diagnosticos
         $formDeletePrescripciones= $this->createGenericDeleteForm('prescripcion_delete');
         $formDeleteDiagnosticos= $this->createGenericDeleteForm('diagnostico_delete');
         $formDeleteReferencias= $this->createGenericDeleteForm('referencia_delete');

         $formNuevoPrescripcion=$this->createGenericNewForm(new PrescripcionType(),'prescripcion_create');
         $formNuevoDiagnostico=$this->createGenericNewForm(new DiagnosticoType(),'diagnostico_create');
         $formNuevoReferencia=$this->createGenericNewForm(new ReferenciaType(),'referencia_create');
         $formNuevoPrescripcion->get('idnotacita')->setData($entity);
         $formNuevoDiagnostico->get('idnotacita')->setData($entity);
         $formNuevoReferencia->get('idnotacita')->setData($entity);

        $UsuarioLogeado=$this->get('security.context')->getToken()->getUser();
         $formNuevoPrescripcion->get('idusuario')->setData($UsuarioLogeado);
         $formNuevoDiagnostico->get('idusuario')->setData($UsuarioLogeado);
         $formNuevoReferencia->get('idusuario')->setData($UsuarioLogeado);

        return $this->render('HCHCBundle:Notacita:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'prescripciones'=>$prescripciones,
            'referencias'=>$referencias,
            'diagnosticos'=>$diagnosticos,
            'formDeletePrescripciones'=>$formDeletePrescripciones->createView(),
            'formDeleteDiagnosticos'=>$formDeleteDiagnosticos->createView(),
            'formDeleteReferencias'=>$formDeleteReferencias->createView(),
            'formNuevoPrescripcion'=>$formNuevoPrescripcion->createView(),
            'formNuevoDiagnostico'=>$formNuevoDiagnostico->createView(),
            'formNuevoReferencia'=>$formNuevoReferencia->createView(),
            
        ));
    }

    /**
     * Displays a form to edit an existing Notacita entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HCHCBundle:Notacita')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Notacita entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HCHCBundle:Notacita:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Notacita entity.
    *
    * @param Notacita $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Notacita $entity)
    {
        $form = $this->createForm(new NotacitaType(), $entity, array(
            'action' => $this->generateUrl('notacita_update', array('id' => $entity->getIdnotacita())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    //Metodo que crea un formulario nuevo para cualquier entidad
    private function createGenericNewForm($entityType, $actionForm){
        $form= $this->createForm($entityType, null, 
        array(
            "action" => $this->generateUrl($actionForm),
            "method"=>"POST"
        ))
        ->add('submit', 'submit', array('label' => 'Agregar'));

        return $form;
    }
        //Metodo para crear un formulario de eliminar generico
     private function createGenericDeleteForm($url){
        return $this->createFormBuilder()
            ->setAction($this->generateUrl($url, array('id' => "texto")))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar'))
            ->getForm()
        ;
    }
    /**
     * Edits an existing Notacita entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HCHCBundle:Notacita')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Notacita entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('notacita_edit', array('id' => $id)));
        }

        return $this->render('HCHCBundle:Notacita:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Notacita entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HCHCBundle:Notacita')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Notacita entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

            return $this->redirect($this->getRequest()->headers->get('referer'));
    }

    /**
     * Creates a form to delete a Notacita entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('notacita_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
