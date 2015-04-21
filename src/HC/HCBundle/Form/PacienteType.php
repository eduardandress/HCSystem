<?php

namespace HC\HCBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PacienteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('idpaciente')
            ->add('cedula', 'text' , array("label"=>"Número de cédula"))
            ->add('nombre', 'text', array("label"=>"Primer Nombre"))
            ->add('apellido', 'text', array("label"=>"Primer Apellido"))
            ->add('direccion', 'textarea', array("label"=>"Dirección"))
            ->add('fechanac', 'text', array("label"=>"Fecha de nacimiento"))
            ->add('numss', 'text', array("label"=>"Número de seguro social"))
            ->add('idmedicopref', 'entity',
                    array(
                        'class'=>'HCHCBundle:Usuario',
                        "label"=>"Medico Preferido",
                        'query_builder' => function(\Doctrine\ORM\EntityRepository  $er) {
                                        return $er->createQueryBuilder('u')
                                        ->where('u.idrol = 2 or u.idrol = 1');
                                        },

                    )
             )
        ;
        $builder
            ->add('telefonosPersonales','collection', 
                    array(
                        'type'=>new PactelfType(), 
                        'allow_add'    => true,
                        'allow_delete' => true,

                    )
                 )
        ;
        $builder
            ->add('telefonosEmergencia','collection', 
                    array(
                        'type'=>new PacnumcontactoType(),
                        'allow_add'    => true,
                        'allow_delete' => true,

                    )
                 )
        ;

    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HC\HCBundle\Entity\Paciente'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'hc_hcbundle_paciente';
    }
}
