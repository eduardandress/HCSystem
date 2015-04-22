<?php

namespace HC\HCBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VisitaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha',null,array('label'=>false,'attr'=>array('class'=>'hidden')))
            ->add('idpaciente',null,array('label'=>'Paciente'))
            ->add('idcita',null,array('label'=>false, 'attr'=>array('class'=>'hidden')))
            ->add('idmedico', 'entity',
                    array(
                        'class'=>'HCHCBundle:Usuario',
                        "label"=>"Medico Encargado",
                        'query_builder' => function(\Doctrine\ORM\EntityRepository  $er) {
                                        return $er->createQueryBuilder('u')
                                        ->where('u.idrol = 2');
                                        },

                    )
                )
            ->add('idenfermera', 'entity',
                    array(
                        'class'=>'HCHCBundle:Usuario',
                        "label"=>"Enfermera Encargada",
                        'query_builder' => function(\Doctrine\ORM\EntityRepository  $er) {
                                        return $er->createQueryBuilder('u')
                                        ->where('u.idrol = 3');
                                        },

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
            'data_class' => 'HC\HCBundle\Entity\Visita'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'hc_hcbundle_visita';
    }
}
