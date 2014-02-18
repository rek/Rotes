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

        // hack it in for now
        // $repository = $this->getDoctrine()
            // ->getRepository('REKDocwizBundle:DocField');


        $formModifier = function(FormInterface $form, DocField $docfield) {
            // $positions = $sport->getAvailablePositions();

            $form->add('field', 'entity', array(
                // 'class' => 'REKDocwizBundle:DocField',
                'choices' => $docfield->findAll(),
            ))

            // $form->add('field', 'entity', array('choices' => $positions));
        };

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function(FormEvent $event) use ($formModifier) {
                // this would be your entity, i.e. Doc
                $data = $event->getData();

                $formModifier($event->getForm(), $data->getField());
            }
        );

        $builder->get('sport')->addEventListener(
            FormEvents::POST_SUBMIT,
            function(FormEvent $event) use ($formModifier) {
                // It's important here to fetch $event->getForm()->getData(), as
                // $event->getData() will get you the client data (that is, the ID)
                $doc = $event->getForm()->getData();

                // since we've added the listener to the child, we'll have to pass on
                // the parent to the callback functions!
                $formModifier($event->getForm()->getParent(), $doc);
            }
        );
    }

    // validation group is auto set, since we are using flows
    // this flow is named: create_doc
    // thus this forms group is: flow_createDoc_step1
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