<?php

namespace HC\HCBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;


use HC\HCBundle\Entity\Phcialergia;
use HC\HCBundle\Entity\Phciconsumo;
use HC\HCBundle\Entity\Phcicondicion;
use HC\HCBundle\Entity\Phcimedicamento;
use HC\HCBundle\Entity\Notacita;
use HC\HCBundle\Entity\Hci;
use HC\HCBundle\Entity\Paciente;
use HC\HCBundle\Form\HciType;
use HC\HCBundle\Form\NotacitaType;
use HC\HCBundle\Form\PhcialergiaType;
use HC\HCBundle\Form\PhcimedicamentoType;
use HC\HCBundle\Form\PhcicondicionType;
use HC\HCBundle\Form\PhciconsumoType;
use HC\HCBundle\Form\PrescripcionType;
use HC\HCBundle\Form\DiagnosticoType;
use HC\HCBundle\Form\ReferenciaType;

use HC\HCBundle\Entity\Prescripcion;
use HC\HCBundle\Entity\Diagnostico;
use HC\HCBundle\Entity\Referencia;





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

        //Se obtiene la cedula introducida en el formulario (campo cedula)
         $cedula=$form->get('cedula')->getData();
         $em= $this->getDoctrine()->getManager();
         //Se busca el paciente con la cedula introducida
         $pacienteConCedula= $em->getRepository('HCHCBundle:Paciente')->findOneByCedula($cedula);
         // Bandera para evitar que sea valido el formulario si no existe la cedula dada
         // (Caso muuy extremo porque se vadilo primero en la vista)
         $pacienteExiste=true;
         if($pacienteConCedula==null){
                $pacienteExiste=false;
         }


         //Solo se procede a insertar la nueva instancia si es valido el formulario y 
         //existe un paciente con la cedula dada
        if ($form->isValid()&& $pacienteExiste) {
            //Se asigna el paciente (el encontrado dado la cedula) a la nueva instacia de HCI
            $entity->setIdpaciente($pacienteConCedula);
            $consumo= $entity->getConsumo();
            $alergia= $entity->getAlergia();
            $medicamento= $entity->getMedicamento();
            $condicion= $entity->getCondicion();

            $entity->setConsumo($consumo);
            $entity->setAlergia($alergia);
            $entity->setMedicamento($medicamento);
            $entity->setCondicion($condicion);

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
        $entity->addAlergia(new Phcialergia() );

        $em = $this->getDoctrine()->getManager();
        $tipoConsumo = $em->getRepository('HCHCBundle:Tipoconsumo')->findAll();

        
        foreach ($tipoConsumo as $tConsumo) {
            $consumo=new Phciconsumo();
            $consumo->setIdtipoconsumo($tConsumo);
            $entity->addConsumo($consumo);
        }

        $entity->addCondicion(new Phcicondicion());
        $entity->addMedicamento(new Phcimedicamento());

        $form = $this->createForm(new HciType(), $entity, array(
            'action' => $this->generateUrl('hci_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

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
        $citaAsociada=$em->getRepository('HCHCBundle:Cita')->findOneBy(array(
            'idpaciente'=>$entity->getIdpaciente(),
            'fechaprogramada'=> date_create(date("Y-m-d"))
            )
        );
         $notacitaHoy=new Notacita(); // creamos una entidad de Nota de cita para realizar un formulario de la cita de hoy
        //  //se crean variables de prescripcion, diagnostico y referencia 
         $NuevoP = new Prescripcion();
         $NuevoD = new Diagnostico();
         $NuevoR = new Referencia();
     
        // //Luego se anexan a la instacia nueva de nota cita
        //  $notacitaHoy->addPrescripcion($NuevoP);
        //  $notacitaHoy->addDiagnostico($NuevoD);
        //  $notacitaHoy->addReferencia($NuevoR);
         
         $notacitaHoyform=$this->createNotacitaform($notacitaHoy); //Creamos un formulario de Nota de cita, apartir de la entidad que se creo anteriormente
         $notacitaHoyform->get('idhci')->setData($entity); // Le asignamos que la hsitoria clinica a la que pertenece es la que esta a punto de mostrar
         $tieneCitaHoy=false;
         $notadeCitahoyRellena=false;
         if($citaAsociada){
            $notacitaHoyform->get('idcita')->setData($citaAsociada);
             $tieneCitaHoy=true;
            // //Se determina si ya se relleno la nota de cita de hoy
             $notaCitadeHoy=$em->getRepository('HCHCBundle:Notacita')->findOneBy(array(
                'idhci'=>$entity->getIdhci(),
                'idcita'=>$citaAsociada->getIdcita()
                )
             );
                if($notaCitadeHoy){
                         $notadeCitahoyRellena=true;
                }
         }
        //Creando fomulario de eliminacion para Nota cita
         $formDeleteNotacita= $this->createGenericDeleteForm('notacita_delete');
         //Creando los formularios de eliminacion para Alergia, Medicamento, Condicion
         $formDeleteAlergia= $this->createGenericDeleteForm('phcialergia_delete');
         $formDeleteMedicamento= $this->createGenericDeleteForm('phcimedicamento_delete');
         $formDeleteCondicion= $this->createGenericDeleteForm('phcicondicion_delete');

         //Creando los formularios de nueva: Alergia, Medicamento,Condicion
         $formNuevoAlergia=$this->createGenericNewForm(new PhcialergiaType(),'phcialergia_create');
         $formNuevoMedicamento=$this->createGenericNewForm(new PhcimedicamentoType(),'phcimedicamento_create');
         $formNuevoCondicion=$this->createGenericNewForm(new PhcicondicionType(),'phcicondicion_create');
         //Asignando los idhci( Esta Instancia ) a los formularios nuevos de Alergia, ect
         $formNuevoAlergia->get('idhci')->setData($entity); // Le asignamos que la hsitoria clinica a la que pertenece es la que esta a punto de mostrar
         $formNuevoMedicamento->get('idhci')->setData($entity); // Le asignamos que la hsitoria clinica a la que pertenece es la que esta a punto de mostrar
         $formNuevoCondicion->get('idhci')->setData($entity); // Le asignamos que la hsitoria clinica a la que pertenece es la que esta a punto de mostrar

        return $this->render('HCHCBundle:Hci:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'notacitahoy'=>$notacitaHoyform->createView(), //Pasamos a la vista el formulario 
            'tieneCitaHoy'=>$tieneCitaHoy,
            'notadeCitahoyRellena'=>$notadeCitahoyRellena,
            'formDeleteAlergia' => $formDeleteAlergia->createView(),
            'formDeleteMedicamento' => $formDeleteMedicamento->createView(),
            'formDeleteCondicion' => $formDeleteCondicion->createView(),
            'formNuevoAlergia'=> $formNuevoAlergia->createView(),
            'formNuevoMedicamento'=> $formNuevoMedicamento->createView(),
            'formNuevoCondicion'=> $formNuevoCondicion->createView(),
            'formDeleteNotacita'=>$formDeleteNotacita->createView(),
        ));
    }
      /**
    * Crea un formulario de nota de cita (de HOY )para mostrarlo en el detalle de historia clinica.
    *
    * @param Notacita $notacita The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    public function createNotacitaform( Notacita $notacita){
        $form = $this->createForm(new NotacitaType(), $notacita , array(
            'action' => $this->generateUrl('notacita_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear','attr'=>array('class'=>'btn btn-success')));

        return $form;

    }
        //Metodo que crea un formulario nuevo para cualquier entidad
    private function createGenericNewForm($entityType, $actionForm){
        $form= $this->createForm($entityType, null, 
        array(
            "action" => $this->generateUrl($actionForm),
            "method"=>"POST"
        ))
        ->add('submit', 'submit', array('label' => 'Agregar'));

        return $form;
    }
    //Metodo para crear un formulario de eliminar generico
     private function createGenericDeleteForm($url){
        return $this->createFormBuilder()
            ->setAction($this->generateUrl($url, array('id' => "texto")))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar'))
            ->getForm()
        ;
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

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

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
            ->add('submit', 'submit', array('label' => 'Eliminar'))
            ->getForm()
        ;
    }
    public function tieneHistoriaAction(Request $request,$cedula){
        $em = $this->getDoctrine()->getManager();
        //Optimizar para no hacer de nuevo la consulta :/
        $paciente = $em->getRepository('HCHCBundle:Paciente')->findOneByCedula($cedula);
        //luego buscar la historia con el paciente de la cedula dada
        $entity = $em->getRepository('HCHCBundle:Hci')->findOneByIdpaciente($paciente);

        if($entity){
            return new JsonResponse(array('respuesta' =>"Verdadero" ));
        }else{
            return new JsonResponse(array('respuesta' => "Falso"));
       }
    }
}
