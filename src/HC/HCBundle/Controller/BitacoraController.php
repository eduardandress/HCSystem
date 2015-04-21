<?php

namespace HC\HCBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use HC\HCBundle\Entity\Bitacora;
use HC\HCBundle\Form\BitacoraType;

/**
 * Bitacora controller.
 *
 */
class BitacoraController extends Controller
{

    /**
     * Lists all Bitacora entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HCHCBundle:Bitacora')->findAll();

        return $this->render('HCHCBundle:Bitacora:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Bitacora entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Bitacora();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('bitacora_show', array('id' => $entity->getId())));
        }

        return $this->render('HCHCBundle:Bitacora:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Bitacora entity.
     *
     * @param Bitacora $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Bitacora $entity)
    {
        $form = $this->createForm(new BitacoraType(), $entity, array(
            'action' => $this->generateUrl('bitacora_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new Bitacora entity.
     *
     */
    public function newAction()
    {
        $entity = new Bitacora();
        $form   = $this->createCreateForm($entity);

        return $this->render('HCHCBundle:Bitacora:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Bitacora entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HCHCBundle:Bitacora')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bitacora entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HCHCBundle:Bitacora:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Bitacora entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HCHCBundle:Bitacora')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bitacora entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HCHCBundle:Bitacora:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Bitacora entity.
    *
    * @param Bitacora $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Bitacora $entity)
    {
        $form = $this->createForm(new BitacoraType(), $entity, array(
            'action' => $this->generateUrl('bitacora_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing Bitacora entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HCHCBundle:Bitacora')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bitacora entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('bitacora_edit', array('id' => $id)));
        }

        return $this->render('HCHCBundle:Bitacora:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Bitacora entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HCHCBundle:Bitacora')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Bitacora entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('bitacora'));
    }

    /**
     * Creates a form to delete a Bitacora entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bitacora_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar'))
            ->getForm()
        ;
    }
}
