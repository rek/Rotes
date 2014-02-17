<?php

namespace REK\DocwizBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DocStep1Type extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('name', 'text');
        // $validValues = array(2, 4);
        // $builder->add('numberOfWheels', 'choice', array(
            // 'choices' => array_combine($validValues, $validValues),
            // 'empty_value' => '',
        // ));
    }

    // public function setDefaultOptions(OptionsResolverInterface $resolver)
    // {
        // $resolver->setDefaults(array(
            // 'validation_groups' => array('registration'),
        // ));
    // }

    public function getName() {
        return 'docStep1';
    }

}