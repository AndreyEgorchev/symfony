<?php

namespace ProdAuto\ProdBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class Spare_partsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('serial_number')
            ->add('description', 'textarea')
            ->add('producer')
            ->add('price_vid')
            ->add('price_do')
            ->add('currency', ChoiceType::class, array(
                'choices'  => array(
                    'ГРН' => 'Грн',
                    'Дол' => 'Дол',
                    'Євро' =>'Євро',
                )))
            ->add('status', ChoiceType::class, array(
                'choices'  => array(
                    'Активний' => 'Активний',
                    'Неактивний' => 'Неактивний',

                )))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ProdAuto\ProdBundle\Entity\Spare_parts'
        ));
    }
}
