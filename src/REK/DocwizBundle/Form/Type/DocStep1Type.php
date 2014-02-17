<?php

namespace REK\DocwizBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class DocStep1Type extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $validValues = array(2, 4);
        $builder->add('numberOfWheels', 'choice', array(
            'choices' => array_combine($validValues, $validValues),
            'empty_value' => '',
        ));
    }

    public function getName() {
        return 'docStep1';
    }

}