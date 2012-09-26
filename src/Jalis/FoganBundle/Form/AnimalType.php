<?php

namespace Jalis\FoganBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AnimalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('breed')
            ->add('birth','date', array(
                    'widget' => 'single_text',
                    'format' => 'dd-MM-yyyy',
                    'data' => new \DateTime(date('d-M-y'))
                 ))
            ->add('color')
            ->add('weight')
            ->add('eyes')
            ->add('status')
//            ->add('users')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Jalis\FoganBundle\Entity\Animal'
        ));
    }

    public function getName()
    {
        return 'jalis_foganbundle_animaltype';
    }
}
