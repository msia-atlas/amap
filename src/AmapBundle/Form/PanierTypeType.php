<?php

namespace AmapBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use AmapBundle\Entity\Panier;
use DateTime;

class PanierTypeType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('libelle')
                ->add('saison', 'entity', array(
                    'class' => 'AmapBundle:Saison',
                    'query_builder' => function ( $er) {
                        return $er->createQueryBuilder('s')
                                ->where('s.dateDebut > :now')
                                ->setParameter('now', new DateTime())
                                ->orderBy('s.dateDebut', 'ASC');
                    },
                    'choice_label' => 'libelle'
                ))
                ->add('prix')
                ->add('typePanier', 'choice', array(
                    'choices' => [Panier::TYPE_PETIT, Panier::TYPE_MOYEN, Panier::TYPE_CRAND]
                        )
                )
                ->add('lignesPanier', 'collection', array(
                    'type' => new LignePanierType(),
                    'allow_add' => true,
                    'allow_delete' => true,
                    'prototype' => true,
                    'prototype_name' => 'lignePanierProto__name__',
                    'options' => array(
                    // options on the rendered TagTypes
                    ),
                ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AmapBundle\Entity\Panier'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'amapbundle_paniertype';
    }

}
