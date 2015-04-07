<?php

namespace HC\HCBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HciType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("idpaciente")
            ->add("alergias", "collection", 
                    array(
                        "type"=> new PhcialergiaType(), 
                        'allow_add'    => true,
                        'allow_delete' => true,
                    )
                 )
            ->add("consumos", "collection", 
                    array(
                        "type"=> new PhciconsumoType(), 
                        'allow_add'    => true,
                        'allow_delete' => true,
                    ) 
                 )
            ->add("medicamentos", "collection", 
                    array(
                        "type"=> new PhcimedicamentoType(), 
                        'allow_add'    => true,
                        'allow_delete' => true,
                    ) 
                 )
            ->add("condiciones", "collection", 
                    array(
                        "type"=> new PhcicondicionType(), 
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
