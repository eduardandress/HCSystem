<?php

namespace HC\HCBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PrescripcionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha',null,array('label'=>false,'attr'=>array('class'=>'hidden')))
            ->add('nombre',null,array('label'=>'Nombre'))
            ->add('instrucciones',null,array('label'=>'Instrucciones'))
            ->add('idnotacita',null,array('label'=>false,'attr'=>array('class'=>'hidden')))
            ->add('idusuario',null,array('label'=>false,'attr'=>array('class'=>'hidden')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HC\HCBundle\Entity\Prescripcion'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'hc_hcbundle_prescripcion';
    }
}
