<?php

namespace REK\RotesBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SettingsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('registration', 'checkbox', array(
            //    'label' => 'Disable Registration',
            //    'required' => false
            // ))
            // ->add('disabled')
            ->add('showpage', 'checkbox', array(
               'label' => 'Enable Registration',
               'required' => false
            ))
            ->add('save', 'submit')
        ;

    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'REK\RotesBundle\Entity\Page'
        ));
    }

    public function getName()
    {
        return 'settings';
    }
}
