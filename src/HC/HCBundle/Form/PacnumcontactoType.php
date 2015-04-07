<?php

namespace HC\HCBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PacnumcontactoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombrecontacto','text',array("label"=>"Nombre"))
            ->add('apellidocontacto','text',array("label"=>"Apellido"))
            ->add('numero','text',array("label"=>"Número de teléfono"))
            ->add('relacion','text',array("label"=>"Relación con el contacto"))
            //->add('fechaagregado')
            ->add('idpaciente', null , array("label"=> false, "attr"=>array("class"=> "hidden")))
            
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HC\HCBundle\Entity\Pacnumcontacto'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'hc_hcbundle_pacnumcontacto';
    }
}
