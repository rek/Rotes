<?php

namespace REK\DocwizBundle\Form\Flow;

use REK\DocwizBundle\Form\Type\DocStep1Type;
use REK\DocwizBundle\Form\Type\DocStep2Type;

use Craue\FormFlowBundle\Form\FormFlow;
use Craue\FormFlowBundle\Form\FormFlowInterface;

class CreateDocFlow extends FormFlow {

    protected function loadStepsConfig() {
        return array(
            array(
                'label' => 'Name',
                'type' => new DocStep1Type(),
            ),
            array(
                'label' => 'Field',
                'type' => new DocStep2Type(),
                // 'skip' => function($estimatedCurrentStepNumber, FormFlowInterface $flow) {
                    // return $estimatedCurrentStepNumber > 1 && !$flow->getFormData()->canHaveEngine();
                // },
            ),
            array(
                'label' => 'Confirmation',
            ),
        );
    }

    public function getName() {
        return 'createDoc';
    }
}