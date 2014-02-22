<?php

namespace REK\RotesBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array(
                'label' => false
            ))
            // ->add('parentId', 'hidden', array(
                // 'data' => '0'
            // ))
        ;

            // 'options' => array('translation_domain' => 'FOSUserBundle'),
    }

    // for binding to the correct model
    // required with using embedded forms
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'REK\RotesBundle\Entity\Category+',
        ));
    }

    public function getName()
    {
        return 'category';
    }
}
