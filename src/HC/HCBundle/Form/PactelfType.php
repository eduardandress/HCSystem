<?php

namespace HC\HCBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PactelfType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idtipotel',null,array("label"=>"Tipo de Teléfono"))
            
            ->add('numero')
            ->add('idpaciente', null , array("label"=> false, "attr"=>array("class"=> "hidden")))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HC\HCBundle\Entity\Pactelf'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'hc_hcbundle_pactelf';
    }
}
