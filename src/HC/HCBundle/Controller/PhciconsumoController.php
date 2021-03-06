<?php

namespace HC\HCBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use HC\HCBundle\Entity\Phciconsumo;
use HC\HCBundle\Form\PhciconsumoType;

/**
 * Phciconsumo controller.
 *
 */
class PhciconsumoController extends Controller
{

    /**
     * Lists all Phciconsumo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HCHCBundle:Phciconsumo')->findAll();

        return $this->render('HCHCBundle:Phciconsumo:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Phciconsumo entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Phciconsumo();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('phciconsumo_show', array('id' => $entity->getIdphciconsumo())));
        }

        return $this->render('HCHCBundle:Phciconsumo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Phciconsumo entity.
     *
     * @param Phciconsumo $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Phciconsumo $entity)
    {
        $form = $this->createForm(new PhciconsumoType(), $entity, array(
            'action' => $this->generateUrl('phciconsumo_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new Phciconsumo entity.
     *
     */
    public function newAction()
    {
        $entity = new Phciconsumo();
        $form   = $this->createCreateForm($entity);

        return $this->render('HCHCBundle:Phciconsumo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Phciconsumo entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HCHCBundle:Phciconsumo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Phciconsumo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HCHCBundle:Phciconsumo:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Phciconsumo entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HCHCBundle:Phciconsumo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Phciconsumo entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HCHCBundle:Phciconsumo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Phciconsumo entity.
    *
    * @param Phciconsumo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Phciconsumo $entity)
    {
        $form = $this->createForm(new PhciconsumoType(), $entity, array(
            'action' => $this->generateUrl('phciconsumo_update', array('id' => $entity->getIdphciconsumo())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing Phciconsumo entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HCHCBundle:Phciconsumo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Phciconsumo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

             $this->get('session')->getFlashBag()->add(
                    'mensaje',
                    'Se ha modificado el consumo  exitosamente'
            );
       return $this->redirect($this->getRequest()->headers->get('referer'));
                
            // return $this->redirect($this->generateUrl('phciconsumo_edit', array('id' => $id)));

        }

        return $this->render('HCHCBundle:Phciconsumo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Phciconsumo entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HCHCBundle:Phciconsumo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Phciconsumo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

       return $this->redirect($this->getRequest()->headers->get('referer'));
        
    }

    /**
     * Creates a form to delete a Phciconsumo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('phciconsumo_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar'))
            ->getForm()
        ;
    }
}
