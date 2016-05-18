<?php

// src/AppBundle/Form/RegistrationType.php

namespace AmapBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use AmapBundle\Repository\FosGroupRepository;

class RegistrationType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('nom');
        $builder->add('prenom');
        $builder->add('adresse');
        $builder->add('groups', 'entity', array(
            'class' => 'AmapBundle:FosGroup',
            'query_builder' => function (FosGroupRepository $er) {
                return $er->createQueryBuilder('f')
                                ->where('f.publique = :public')
                                ->setParameter('public', true);
            },
            
            'expanded' => true,
            'multiple' => true,
            
                // 'choices' => $this->findGroup()
                //   'choices' => array('Consommateur' => 1, 'Producteur' => 2, 'volontaire' => 3),
                // 'choices_as_values' => true,
        ));
    }

    public function getParent() {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }

    public function getBlockPrefix() {
        return 'app_user_registration';
    }

    // For Symfony 2.x
    public function getName() {
        return $this->getBlockPrefix();
    }

}
