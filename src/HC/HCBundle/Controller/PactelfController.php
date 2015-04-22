<?php

namespace HC\HCBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use HC\HCBundle\Entity\Pactelf;
use HC\HCBundle\Entity\Paciente;
use HC\HCBundle\Form\PactelfType;

/**
 * Pactelf controller.
 *
 */
class PactelfController extends Controller
{

    /**
     * Lists all Pactelf entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HCHCBundle:Pactelf')->findAll();

        return $this->render('HCHCBundle:Pactelf:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Pactelf entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Pactelf();
  
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            //return $this->redirect($this->generateUrl('pactelf_show', array('id' => $entity->getIdpactelf())));

            $this->get('session')->getFlashBag()->add(
                    'mensaje',
                    'Se ha agregado el nuevo teléfono personal exitosamente'
            );
            return $this->redirect($this->getRequest()->headers->get('referer'));
        }

        return $this->render('HCHCBundle:Pactelf:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Pactelf entity.
     *
     * @param Pactelf $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Pactelf $entity)
    {
        $form = $this->createForm(new PactelfType(), $entity, array(
            'action' => $this->generateUrl('pactelf_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new Pactelf entity.
     *
     */
    public function newAction()
    {
        $entity = new Pactelf();
        $form   = $this->createCreateForm($entity);

        return $this->render('HCHCBundle:Pactelf:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Pactelf entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HCHCBundle:Pactelf')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pactelf entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HCHCBundle:Pactelf:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Pactelf entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HCHCBundle:Pactelf')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pactelf entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);


        return $this->render('HCHCBundle:Pactelf:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Pactelf entity.
    *
    * @param Pactelf $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Pactelf $entity)
    {
        $form = $this->createForm(new PactelfType(), $entity, array(
            'action' => $this->generateUrl('pactelf_update', array('id' => $entity->getIdpactelf())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing Pactelf entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HCHCBundle:Pactelf')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pactelf entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            //return $this->redirect($this->generateUrl('pactelf_edit', array('id' => $id)));
            $this->get('session')->getFlashBag()->add(
                    'mensaje',
                    'Se ha modificado el teléfono personal exitosamente'
            );
            return $this->redirect($this->getRequest()->headers->get('referer'));
        }

        return $this->render('HCHCBundle:Pactelf:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Pactelf entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HCHCBundle:Pactelf')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Pactelf entity.');
            }

            $em->remove($entity);
            $em->flush();

             $this->get('session')->getFlashBag()->add(
                    'mensaje',
                    'Se ha eliminado el  teléfono personal exitosamente'
            );
        }

       return $this->redirect($this->getRequest()->headers->get('referer'));
    }

    /**
     * Creates a form to delete a Pactelf entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pactelf_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar'))
            ->getForm()
        ;
    }
}
