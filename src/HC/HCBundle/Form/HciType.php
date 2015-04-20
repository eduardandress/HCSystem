<?php

namespace HC\HCBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use HC\HCBundle\Entity\cambiarFormularioHci;
;
class HciType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            ->add("idpaciente",null, array('label'=>false,'attr'=>array('class'=>'hidden')))
            ->add('cedula','text',array('label'=>'Paciente','mapped'=>false))
            ->add("alergia", "collection", 
                    array(
                        "type"=> new PhcialergiaType(), 
                        'allow_add'    => true,
                        'allow_delete' => true,
                    )
                 )

            ->add("consumo", "collection", 
                    array(
                        "type"=> new PhciconsumoType(), 
                        'allow_add'    => true,
                        'allow_delete' => true,
                    ) 
                 )
            ->add("medicamento", "collection", 
                    array(
                        "type"=> new PhcimedicamentoType(), 
                        'allow_add'    => true,
                        'allow_delete' => true,
                    ) 
                 )
            ->add("condicion", "collection", 
                    array(
                        "type"=> new PhcicondicionType(), 
                        'allow_add'    => true,
                        'allow_delete' => true,
                    ) 
                 )
            ->add("notacita",'collection',
                    array(  
                        "type"=> new NotacitaType(),
                        
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
            'data_class' => 'HC\HCBundle\Entity\Hci'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'hc_hcbundle_hci';
    }
}
