<?php
// src/AppBundle/Admin/ApartmentAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ApartmentAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->tab('Tab 1', array('class' => 'col-md-6'))
                ->with('Content', array('class' => 'col-md-4'))
                    ->add('fullName', 'text')
                    ->add('shortName', 'text')
                    ->end()

                    ->with('Meta data', array('class' => 'col-md-6'))
                    ->add('building', 'sonata_type_model', array(
                        'class' => 'AppBundle\Entity\Building',
                    ))
                    ->add('apartmentType', 'sonata_type_model', array(
                        'class' => 'AppBundle\Entity\ApartmentType',
                    ))
                ->end()
            ->end()
            ->tab('Tab 2')
                ->with('Facts', array('class' => 'col-md-6'))
                ->add('floorNumber', 'integer')
                ->add('apartmentNumber', 'text')
                ->add('roomCount', 'integer')
                ->add('bathroomCount', 'integer')
                ->add('bedroomCount', 'integer')
            ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('fullName')
            ->add('shortName')
            ->add('building')
            ->add('apartmentType')
            ->add('floorNumber')
            ->add('apartmentNumber')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('fullName')
            ->addIdentifier('building')
            ->addIdentifier('apartmentType')
            ->addIdentifier('floorNumber')
            ->addIdentifier('apartmentNumber')
        ;
    }
}

