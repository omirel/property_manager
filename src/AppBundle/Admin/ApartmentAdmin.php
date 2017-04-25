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
            ->with('Content', array('class' => 'col-md-4'))
            ->add('fullName', 'text')
            ->add('shortName', 'text')
            ->end()

            ->with('Facts', array('class' => 'col-md-4'))
            ->add('floorNumber', 'integer')
            ->add('apartmentNumber', 'text')
            ->add('roomCount', 'integer')
            ->add('bathroomCount', 'integer')
            ->add('bedroomCount', 'integer')
            ->end()

            ->with('Meta data', array('class' => 'col-md-4'))
            ->add('building', 'sonata_type_model', array(
                'class' => 'AppBundle\Entity\Building',
            ))
            ->add('apartmentType', 'sonata_type_model', array(
                'class' => 'AppBundle\Entity\ApartmentType',
            ))
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

