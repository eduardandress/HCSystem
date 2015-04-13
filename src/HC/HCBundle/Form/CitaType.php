<?php

namespace HC\HCBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\PropertyAccess\PropertyPath;


use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormError;
class CitaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('fechacreacion', null ,array('label'=>'Fecha de Creacion'))
            ->add('cedula','text',array('label'=>'Paciente','mapped'=>false))
            ->add('idpaciente',null, array('label'=>'Paciente','attr'=>array('class'=>'hidden')))
            ->add('fechaprogramada',null, array('label'=>'Fecha Programada','widget' => 'single_text'))
            ->add('horaprogramada',null, array('label'=>'Hora Programada'))
            ->add('motivo',null, array('label'=>'Motivo de la cita'))
            //->add('idusuario',null, array('label'=>' ', 'attr'=> array('class'=>'hidden')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HC\HCBundle\Entity\Cita'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'hc_hcbundle_cita';
    }
}
