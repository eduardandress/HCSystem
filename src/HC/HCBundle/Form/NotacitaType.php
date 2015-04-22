<?php

namespace HC\HCBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NotacitaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('presionarterial',null,array('label'=>'Presión Arterial'))
            ->add('alturapaciente',null,array('label'=>'Altura del paciente'))
            ->add('pesopaciente',null,array('label'=>'Peso del paciente'))
            ->add('frecuenciacardiaca',null,array('label'=>'Frecuencia Cardíaca'))
            ->add('temperatura',null,array('label'=>'Temperatura Corporal'))
            ->add('idcita',null,array("label"=> false, "attr"=>array("class"=> "hidden")))
            ->add('idhci',null,array("label"=> false, "attr"=>array("class"=> "hidden")))
            ->add('prescripcion','collection',
                array(
                    'type'=>new PrescripcionType(),
                      'allow_add'    => true,
                      'allow_delete' => true,
                      'label'=>false,
                      'attr'=>array('class'=>'hidden')
                    )
                )
            ->add('referencia','collection',
                array(
                    'type'=>new ReferenciaType(),
                     'allow_add'    => true,
                    'allow_delete' => true,
                      'label'=>false,
                      'attr'=>array('class'=>'hidden')
                    )
                )
            ->add('diagnostico','collection',
                array(
                    'type'=>new DiagnosticoType(),
                     'allow_add'    => true,
                    'allow_delete' => true,
                      'label'=>false,
                      'attr'=>array('class'=>'hidden')
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
            'data_class' => 'HC\HCBundle\Entity\Notacita',
      
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'hc_hcbundle_notacita';
    }
}
