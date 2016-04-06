<?php

namespace AmapBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProduitType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle')
            ->add('saison')
            ->add('typeProduit')
            ->add('uniteMesure')
            ->add('prixUnitaire')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AmapBundle\Entity\Produit'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'amapbundle_produit';
    }
}
