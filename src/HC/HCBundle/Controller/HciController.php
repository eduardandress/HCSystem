<?php

namespace HC\HCBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


use HC\HCBundle\Entity\Phcialergia;
use HC\HCBundle\Entity\Phciconsumo;
use HC\HCBundle\Entity\Phcicondicion;
use HC\HCBundle\Entity\Phcimedicamento;

use HC\HCBundle\Entity\Hci;
use HC\HCBundle\Form\HciType;

/**
 * Hci controller.
 *
 */
class HciController extends Controller
{

    /**
     * Lists all Hci entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HCHCBundle:Hci')->findAll();

        return $this->render('HCHCBundle:Hci:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Hci entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Hci();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {

            $consumos= $entity->getConsumos();
            $alergias= $entity->getAlergias();
            $medicamentos= $entity->getMedicamentos();
            $condiciones= $entity->getCondiciones();

            $entity->setConsumos($consumos);
            $entity->setAlergias($alergias);
            $entity->setMedicamentos($medicamentos);
            $entity->setCondiciones($condiciones);

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('hci_show', array('id' => $entity->getIdhci())));
        }

        return $this->render('HCHCBundle:Hci:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Hci entity.
     *
     * @param Hci $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Hci $entity)
    {
        $entity->addAlergias(new Phcialergia() );

        $em = $this->getDoctrine()->getManager();
        $tipoConsumos = $em->getRepository('HCHCBundle:Tipoconsumo')->findAll();

        
        foreach ($tipoConsumos as $tConsumo) {
            $consumo=new Phciconsumo();
            $consumo->setIdtipoconsumo($tConsumo);
            $entity->addConsumos($consumo);
        }

        $entity->addCondiciones(new Phcicondicion());
        $entity->addMedicamentos(new Phcimedicamento());

        $form = $this->createForm(new HciType(), $entity, array(
            'action' => $this->generateUrl('hci_create'),
            'method' => 'POST',
        ));

       
        
        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Hci entity.
     *
     */
    public function newAction()
    {
        $entity = new Hci();
        $form   = $this->createCreateForm($entity);

        return $this->render('HCHCBundle:Hci:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Hci entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HCHCBundle:Hci')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Hci entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HCHCBundle:Hci:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Hci entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HCHCBundle:Hci')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Hci entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HCHCBundle:Hci:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Hci entity.
    *
    * @param Hci $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Hci $entity)
    {
        $form = $this->createForm(new HciType(), $entity, array(
            'action' => $this->generateUrl('hci_update', array('id' => $entity->getIdhci())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Hci entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HCHCBundle:Hci')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Hci entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('hci_edit', array('id' => $id)));
        }

        return $this->render('HCHCBundle:Hci:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Hci entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HCHCBundle:Hci')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Hci entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('hci'));
    }

    /**
     * Creates a form to delete a Hci entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('hci_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
