<?php

namespace HC\HCBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use HC\HCBundle\Entity\Phcialergia;
use HC\HCBundle\Form\PhcialergiaType;

/**
 * Phcialergia controller.
 *
 */
class PhcialergiaController extends Controller
{

    /**
     * Lists all Phcialergia entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HCHCBundle:Phcialergia')->findAll();

        return $this->render('HCHCBundle:Phcialergia:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Phcialergia entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Phcialergia();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->getRequest()->headers->get('referer'));
        }

        return $this->render('HCHCBundle:Phcialergia:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Phcialergia entity.
     *
     * @param Phcialergia $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Phcialergia $entity)
    {
        $form = $this->createForm(new PhcialergiaType(), $entity, array(
            'action' => $this->generateUrl('phcialergia_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Phcialergia entity.
     *
     */
    public function newAction()
    {
        $entity = new Phcialergia();
        $form   = $this->createCreateForm($entity);

        return $this->render('HCHCBundle:Phcialergia:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Phcialergia entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HCHCBundle:Phcialergia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Phcialergia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HCHCBundle:Phcialergia:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Phcialergia entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HCHCBundle:Phcialergia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Phcialergia entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HCHCBundle:Phcialergia:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Phcialergia entity.
    *
    * @param Phcialergia $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Phcialergia $entity)
    {
        $form = $this->createForm(new PhcialergiaType(), $entity, array(
            'action' => $this->generateUrl('phcialergia_update', array('id' => $entity->getIdphcialergia())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Phcialergia entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HCHCBundle:Phcialergia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Phcialergia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('phcialergia_edit', array('id' => $id)));
        }

        return $this->render('HCHCBundle:Phcialergia:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Phcialergia entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HCHCBundle:Phcialergia')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Phcialergia entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

            return $this->redirect($this->getRequest()->headers->get('referer'));
    }

    /**
     * Creates a form to delete a Phcialergia entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('phcialergia_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
