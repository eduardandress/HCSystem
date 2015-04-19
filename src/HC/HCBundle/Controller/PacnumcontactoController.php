<?php

namespace HC\HCBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use HC\HCBundle\Entity\Pacnumcontacto;
use HC\HCBundle\Form\PacnumcontactoType;

/**
 * Pacnumcontacto controller.
 *
 */
class PacnumcontactoController extends Controller
{

    /**
     * Lists all Pacnumcontacto entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HCHCBundle:Pacnumcontacto')->findAll();

        return $this->render('HCHCBundle:Pacnumcontacto:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Pacnumcontacto entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Pacnumcontacto();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            //return $this->redirect($this->generateUrl('pacnumcontacto_show', array('id' => $entity->getIdpacnumcontacto())));
             return $this->redirect($this->getRequest()->headers->get('referer'));
            

        }

        return $this->render('HCHCBundle:Pacnumcontacto:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Pacnumcontacto entity.
     *
     * @param Pacnumcontacto $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Pacnumcontacto $entity)
    {
        $form = $this->createForm(new PacnumcontactoType(), $entity, array(
            'action' => $this->generateUrl('pacnumcontacto_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new Pacnumcontacto entity.
     *
     */
    public function newAction()
    {
        $entity = new Pacnumcontacto();
        $form   = $this->createCreateForm($entity);

        return $this->render('HCHCBundle:Pacnumcontacto:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Pacnumcontacto entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HCHCBundle:Pacnumcontacto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pacnumcontacto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HCHCBundle:Pacnumcontacto:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Pacnumcontacto entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HCHCBundle:Pacnumcontacto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pacnumcontacto entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HCHCBundle:Pacnumcontacto:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Pacnumcontacto entity.
    *
    * @param Pacnumcontacto $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Pacnumcontacto $entity)
    {
        $form = $this->createForm(new PacnumcontactoType(), $entity, array(
            'action' => $this->generateUrl('pacnumcontacto_update', array('id' => $entity->getIdpacnumcontacto())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing Pacnumcontacto entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HCHCBundle:Pacnumcontacto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pacnumcontacto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            //return $this->redirect($this->generateUrl('pacnumcontacto_edit', array('id' => $id)));
            return $this->redirect($this->getRequest()->headers->get('referer'));
            
        }

        return $this->render('HCHCBundle:Pacnumcontacto:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Pacnumcontacto entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HCHCBundle:Pacnumcontacto')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Pacnumcontacto entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        //return $this->redirect($this->generateUrl('pacnumcontacto'));
       return $this->redirect($this->getRequest()->headers->get('referer'));
        
    }

    /**
     * Creates a form to delete a Pacnumcontacto entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pacnumcontacto_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar'))
            ->getForm()
        ;
    }
}
