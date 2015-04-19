<?php

namespace HC\HCBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use HC\HCBundle\Entity\Visita;
use HC\HCBundle\Form\VisitaType;

/**
 * Visita controller.
 *
 */
class VisitaController extends Controller
{

    /**
     * Lists all Visita entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HCHCBundle:Visita')->findAll();

        return $this->render('HCHCBundle:Visita:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Visita entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Visita();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('gestionarvisitas_show', array('id' => $entity->getIdvisita())));
        }

        return $this->render('HCHCBundle:Visita:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Visita entity.
     *
     * @param Visita $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Visita $entity)
    {
        $form = $this->createForm(new VisitaType(), $entity, array(
            'action' => $this->generateUrl('gestionarvisitas_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Visita entity.
     *
     */
    public function newAction()
    {
        $entity = new Visita();
        $form   = $this->createCreateForm($entity);

        return $this->render('HCHCBundle:Visita:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Visita entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HCHCBundle:Visita')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Visita entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HCHCBundle:Visita:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Visita entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HCHCBundle:Visita')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Visita entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HCHCBundle:Visita:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Visita entity.
    *
    * @param Visita $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Visita $entity)
    {
        $form = $this->createForm(new VisitaType(), $entity, array(
            'action' => $this->generateUrl('gestionarvisitas_update', array('id' => $entity->getIdvisita())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Visita entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HCHCBundle:Visita')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Visita entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('gestionarvisitas_edit', array('id' => $id)));
        }

        return $this->render('HCHCBundle:Visita:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Visita entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HCHCBundle:Visita')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Visita entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('gestionarvisitas'));
    }

    /**
     * Creates a form to delete a Visita entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('gestionarvisitas_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}