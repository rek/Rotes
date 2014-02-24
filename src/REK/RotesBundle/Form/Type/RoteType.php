<?php

namespace REK\RotesBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class RoteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('message', 'textarea')
            // ->add('category', 'entity', array(
                // 'class' => 'REKRotesBundle:Category',
                // 'property' => 'name',
            // ))
            ->addEventListener(
                FormEvents::PRE_SET_DATA,
                array($this, 'onPreSetData')
            )
            // ?? ->get('category')->addEventListener(
            // ->addEventListener(
                // FormEvents::POST_SUBMIT,
                // array($this, 'onPostSubmit')
            // )
            ->add('save', 'submit')
        ;

        // 'options' => array('translation_domain' => 'FOSUserBundle'),
    }


    public function onPreSetData(FormEvent $event){
        $rote = $event->getData();
        $form = $event->getForm();

        // check if the Rote object is "new"
        // If no data is passed to the form, the data is "null".
        // This should be considered a new "Rote"
        if (!$rote || null === $rote->getId()) {
            $form->add('category', 'text');
        } else {
            $form->add('category', 'entity', array(
                'class' => 'REKRotesBundle:Category',
                'property' => 'name',
            ));

        }
    }
    public function onPostSubmit(FormEvent $event){
        // It's important here to fetch $event->getForm()->getData(), as
        // $event->getData() will get you the client data (that is, the ID)
        // $rote = $event->getForm()->getData();
        // $rote = $event->getData();
        // $formModifier($event->getForm()->getParent(), $sport);
    }


    // for binding to the correct model
    // required with using embedded forms
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'REK\RotesBundle\Entity\Rote',
            'cascade_validation' => true, // <- also do the sub forms
        ));
    }

    public function getName()
    {
        return 'rote';
    }
}
