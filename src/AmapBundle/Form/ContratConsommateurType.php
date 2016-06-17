<?php

namespace AmapBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use DateTime;
class ContratConsommateurType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder ->add('saison', 'entity', array(
                    'class' => 'AmapBundle:Saison',
                    'query_builder' => function ( $er) {
                        return $er->createQueryBuilder('s')
                                ->where('s.dateDebut > :now')
                                ->setParameter('now', new DateTime())
                                ->orderBy('s.dateDebut', 'ASC');
                    },
                    'choice_label' => 'libelle'
                ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AmapBundle\Entity\ContratConsommateur'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'amapbundle_contratconsommateur';
    }
}
