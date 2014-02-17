<?php

namespace REK\DocwizBundle\Form\Flow;

use Craue\FormFlowBundle\Form\FormFlow;
use Craue\FormFlowBundle\Form\FormFlowInterface;

class docFlow extends FormFlow {

    public function getName() {
        return 'doc';
    }

    protected function loadStepsConfig() {
        return array(
            array(
                'label' => 'wheels',
                'type' => new DocStep1Type(),
            ),
            array(
                'label' => 'engine',
                'type' => new DocStep2Type(),
                // 'skip' => function($estimatedCurrentStepNumber, FormFlowInterface $flow) {
                    // return $estimatedCurrentStepNumber > 1 && !$flow->getFormData()->canHaveEngine();
                },
            ),
            array(
                'label' => 'confirmation',
            ),
        );
    }

}