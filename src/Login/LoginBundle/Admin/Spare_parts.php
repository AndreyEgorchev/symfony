<?php


namespace Login\LoginBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class Spare_parts extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper

            ->add('title')
            ->add('serial_number')
            ->add('description')
            ->add('producer')
            ->add('currency')
            ->add('created')
            ->add('status')
            ->add('user_id')
            ->add('price_vid')
            ->add('price_do')

            ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('title')
            ->add('serial_number')
            ->add('description')
            ->add('producer')
            ->add('currency')
            ->add('created')
            ->add('status',null, array('editable'=>true))
            ->add('user_id')
            ->add('price_vid')
            ->add('price_do')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('title')
            ->add('serial_number')
            ->add('description')
            ->add('producer')
            ->add('currency')
            ->add('created')
            ->add('status',null, array('editable'=>true))
            ->add('user_id')
            ->add('price_vid')
            ->add('price_do')

        ;
    }
}