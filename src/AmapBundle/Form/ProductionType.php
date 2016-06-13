<?php

namespace AmapBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('producteur')
            ->add('produit')
            ->add('quantiteLivree')
            ->add('dateLivraison')
            ->add('dateLancement')
            ->add('statut')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AmapBundle\Entity\Production'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'amapbundle_production';
    }
}
