<?php

namespace REK\DocwizBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class DocStep2Type extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('field', 'text');
        // $validValues = array(2, 4);
        // $builder->add('temp', 'form_type_vehicleEngine', array(
            // 'empty_value' => '',
        // ));
    }

    public function getName() {
        return 'docStep2';
    }

}