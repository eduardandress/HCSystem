<?php

namespace HC\HCBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use HC\HCBundle\Entity\Phcicondicion;
use HC\HCBundle\Form\PhcicondicionType;

/**
 * Phcicondicion controller.
 *
 */
class PhcicondicionController extends Controller
{

    /**
     * Lists all Phcicondicion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HCHCBundle:Phcicondicion')->findAll();

        return $this->render('HCHCBundle:Phcicondicion:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Phcicondicion entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Phcicondicion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

             $this->get('session')->getFlashBag()->add(
                    'mensaje',
                    'Se ha agregado una nueva condición  exitosamente'
            );
            return $this->redirect($this->getRequest()->headers->get('referer'));
        }

        return $this->render('HCHCBundle:Phcicondicion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Phcicondicion entity.
     *
     * @param Phcicondicion $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Phcicondicion $entity)
    {
        $form = $this->createForm(new PhcicondicionType(), $entity, array(
            'action' => $this->generateUrl('phcicondicion_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new Phcicondicion entity.
     *
     */
    public function newAction()
    {
        $entity = new Phcicondicion();
        $form   = $this->createCreateForm($entity);

        return $this->render('HCHCBundle:Phcicondicion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Phcicondicion entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HCHCBundle:Phcicondicion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Phcicondicion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HCHCBundle:Phcicondicion:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Phcicondicion entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HCHCBundle:Phcicondicion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Phcicondicion entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HCHCBundle:Phcicondicion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Phcicondicion entity.
    *
    * @param Phcicondicion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Phcicondicion $entity)
    {
        $form = $this->createForm(new PhcicondicionType(), $entity, array(
            'action' => $this->generateUrl('phcicondicion_update', array('id' => $entity->getIdphcicondicion())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing Phcicondicion entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HCHCBundle:Phcicondicion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Phcicondicion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

             $this->get('session')->getFlashBag()->add(
                    'mensaje',
                    'Se ha modificado la condición  exitosamente'
            );

            return $this->redirect($this->generateUrl('phcicondicion_edit', array('id' => $id)));
        }

        return $this->render('HCHCBundle:Phcicondicion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Phcicondicion entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HCHCBundle:Phcicondicion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Phcicondicion entity.');
            }

            $em->remove($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                    'mensaje',
                    'Se ha eliminado la condición  exitosamente'
            );

        }

       return $this->redirect($this->getRequest()->headers->get('referer'));
       
    }

    /**
     * Creates a form to delete a Phcicondicion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('phcicondicion_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar'))
            ->getForm()
        ;
    }
}
