<?php

namespace CodeReview\RestBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CarType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array(
                'required' => true,
            ))
            ->add('brand', 'text', array(
                'required' => true,
            ))
            ->add('picture', 'text', array(
                'required' => true,
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CodeReview\RestBundle\Entity\Car'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'codereview_restbundle_car';
    }
}
