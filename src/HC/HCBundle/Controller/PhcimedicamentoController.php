<?php

namespace HC\HCBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use HC\HCBundle\Entity\Phcimedicamento;
use HC\HCBundle\Form\PhcimedicamentoType;

/**
 * Phcimedicamento controller.
 *
 */
class PhcimedicamentoController extends Controller
{

    /**
     * Lists all Phcimedicamento entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HCHCBundle:Phcimedicamento')->findAll();

        return $this->render('HCHCBundle:Phcimedicamento:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Phcimedicamento entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Phcimedicamento();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

             $this->get('session')->getFlashBag()->add(
                    'mensaje',
                    'Se ha agregado el medicamento  exitosamente'
            );
            return $this->redirect($this->getRequest()->headers->get('referer'));
        }

        return $this->render('HCHCBundle:Phcimedicamento:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Phcimedicamento entity.
     *
     * @param Phcimedicamento $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Phcimedicamento $entity)
    {
        $form = $this->createForm(new PhcimedicamentoType(), $entity, array(
            'action' => $this->generateUrl('phcimedicamento_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new Phcimedicamento entity.
     *
     */
    public function newAction()
    {
        $entity = new Phcimedicamento();
        $form   = $this->createCreateForm($entity);

        return $this->render('HCHCBundle:Phcimedicamento:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Phcimedicamento entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HCHCBundle:Phcimedicamento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Phcimedicamento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HCHCBundle:Phcimedicamento:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Phcimedicamento entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HCHCBundle:Phcimedicamento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Phcimedicamento entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HCHCBundle:Phcimedicamento:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Phcimedicamento entity.
    *
    * @param Phcimedicamento $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Phcimedicamento $entity)
    {
        $form = $this->createForm(new PhcimedicamentoType(), $entity, array(
            'action' => $this->generateUrl('phcimedicamento_update', array('id' => $entity->getIdphcimedicamento())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing Phcimedicamento entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HCHCBundle:Phcimedicamento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Phcimedicamento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();


             $this->get('session')->getFlashBag()->add(
                    'mensaje',
                    'Se ha modificado el medicamento  exitosamente'
            );
            return $this->redirect($this->generateUrl('phcimedicamento_edit', array('id' => $id)));
        }

        return $this->render('HCHCBundle:Phcimedicamento:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Phcimedicamento entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HCHCBundle:Phcimedicamento')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Phcimedicamento entity.');
            }

            $em->remove($entity);
            $em->flush();

             $this->get('session')->getFlashBag()->add(
                    'mensaje',
                    'Se ha eliminado el medicamento  exitosamente'
            );
        }

       return $this->redirect($this->getRequest()->headers->get('referer'));
        
    }

    /**
     * Creates a form to delete a Phcimedicamento entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('phcimedicamento_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar'))
            ->getForm()
        ;
    }
}
