<?php

namespace HC\HCBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

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
            ->add('idpaciente',null, array('label'=>'Paciente'))
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
