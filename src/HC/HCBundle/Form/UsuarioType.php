<?php

namespace HC\HCBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UsuarioType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('usuario',null, array("label"=>"Nombre de usuario"))
            ->add('clave',null, array("label"=>"Clave"))
            ->add('nombre',null, array("label"=>"Nombre Completo"))
            ->add('fechanac',null, array("label"=>"Fecha de nacimiento","widget"=>"single_text"))
            ->add('numss',null, array("label"=>"Número de seguro social"))
            ->add('direccion',null, array("label"=>"Dirección"))
            ->add('telefono',null, array("label"=>"Teléfono Personal"))
            ->add('fechainicio',null, array("widget"=> "single_text", "label"=>"Fecha de Inicio"))
            ->add('idrol',null, array("label"=>"Rol de usuario"))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HC\HCBundle\Entity\Usuario'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'hc_hcbundle_usuario';
    }
}
