<?php


namespace HC\HCBundle\Controller;
use HC\HCBundle\Entity\Paciente;
use HC\HCBundle\Entity\Pactelf;
use HC\HCBundle\Entity\Pacnumcontacto;
use HC\HCBundle\Form\PacienteType;
use HC\HCBundle\Form\PactelfType;
use HC\HCBundle\Form\PacnumcontactoType;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Paciente controller.
 *
 */
class PacienteController extends Controller
{

    /**
     * Lists all Paciente entities.
     *
     */
    public function indexAction()
    {
       
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HCHCBundle:Paciente')->findAll();

        return $this->render('HCHCBundle:Paciente:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Paciente entity.
     *
     */
    public function crearAction(Request $request){
        $Paciente = new Paciente();
        $form= $this->generateForm($Paciente);
        

        $form->handleRequest($request);
        if($form->isSubmitted()){
            if($form->isValid()){

                $tlfPersonales= $Paciente->getTelefonosPersonales();
                $tlfEmergencia= $Paciente->getTelefonosEmergencia();
                $Paciente->setTelefonosPersonales($tlfPersonales);
                $Paciente->setTelefonosEmergencia($tlfEmergencia);

                
                $em = $this->getDoctrine()->getManager();
                $em->persist($Paciente);
                $em->flush();


                $PagRedirect= $this->generateUrl('paciente');
                return $this->redirect($PagRedirect);
                            
            }else{
                echo $form->getErrorsAsString();
            }
        }
            
        return $this->render('HCHCBundle:Paciente:new.html.twig', 
        array(
             'form' => $form->createView(),

        ));

    }

    /**
    * Creates a form to edit a Paciente entity.
    *
    * @param Paciente $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Paciente $Paciente)
    {

        $TelfPersonal = new Pactelf();
        $TelfEmegencia = new Pacnumcontacto();
       // $Pactelf2 = new Pactelf();
       // $Paciente->getTelefonosPersonales()->add($TelfPersonal);
       // $Paciente->getTelefonosPersonales()->add($Pactelf2);
        //$Paciente->getTelefonosEmergencia()->add($TelfEmegencia);


        $form = $this->createForm(new PacienteType(), $Paciente, array(
            'action' => $this->generateUrl('paciente_update', array('id' => $Paciente->getIdpaciente())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;


    }

    /**
     * Creates a form to create a Paciente entity.
     *
     * @param Paciente $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function generateForm(Paciente $Paciente){

        $TelfPersonal = new Pactelf();
        $TelfEmegencia = new Pacnumcontacto();
        $Paciente->addTelefonosPersonales($TelfPersonal);
        $Paciente->addTelefonosEmergencia($TelfEmegencia);

        $form = $this->createForm(new PacienteType(), $Paciente,
            array(
                'action' => $this->generateUrl('registrarPac'),
                'method' => 'POST'    
            )

        );
        

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Paciente entity.
     *
     */
    public function nuevoAction()
    {
        $Paciente = new Paciente();
        $form= $this->generateForm($Paciente);

        return $this->render('HCHCBundle:Paciente:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Paciente entity.
     *
     */
    public function mostrarAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HCHCBundle:Paciente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Paciente entity.');
        }
        
        $deleteForm = $this->createDeleteForm($id);

        $FormNuevoTelPersonal=  $this->createGenericNewForm(new PactelfType(),'pactelf_create');
        $FormNuevoTelPersonal->get("idpaciente")->setData($entity);

        $FormNuevoTelEmergencia= $this->createGenericNewForm(new PacnumcontactoType(),'pacnumcontacto_create');
        $FormNuevoTelEmergencia->get("idpaciente")->setData($entity);


        $FormEliminarTelPersonal=  $this->createGenericDeleteForm("pactelf_delete");
        $FormEliminarTelEmergencia=  $this->createGenericDeleteForm("pacnumcontacto_delete");



        return $this->render('HCHCBundle:Paciente:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'FormNuevoTelPersonal'=>  $FormNuevoTelPersonal->createView(),
            'FormNuevoTelEmergencia'=>  $FormNuevoTelEmergencia->createView(),
            'FormEliminarTelPersonal'=> $FormEliminarTelPersonal->createView(),
            'FormEliminarTelEmergencia'=> $FormEliminarTelEmergencia->createView(),
        ));

    }
    private function createGenericNewForm($entity, $actionForm){
        $form= $this->createForm($entity, null, 
        array(
            "action" => $this->generateUrl($actionForm),
            "method"=>"POST"
        ))
        ->add('submit', 'submit', array('label' => 'Agregar'));

        return $form;
    }
    private function createGenericDeleteForm($url)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl($url, array('id' => "texto")))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    /**
     * Displays a form to edit an existing Paciente entity.
     *
     */
    public function editarAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HCHCBundle:Paciente')->find($id);

        
       

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Paciente entity.');
        }

        $editForm = $this->createEditForm($entity) 
                    ->remove("telefonosPersonales")
                    ->remove("telefonosEmergencia")
        ;
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HCHCBundle:Paciente:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    
    /**
     * Edits an existing Paciente entity.
     *
     */
    public function actualizarAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HCHCBundle:Paciente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Paciente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('paciente_edit', array('id' => $id)));
        }

        return $this->render('HCHCBundle:Paciente:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Paciente entity.
     *
     */
    public function eliminarAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HCHCBundle:Paciente')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Paciente entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('paciente'));
    }

    /**
     * Creates a form to delete a Paciente entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('paciente_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }



}
