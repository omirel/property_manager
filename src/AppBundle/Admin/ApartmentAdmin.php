<?php
// src/AppBundle/Admin/ApartmentAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class ApartmentAdmin extends AbstractAdmin
{
    protected $parentAssociationMapping = 'building';

    protected function configureRoutes(RouteCollection $collection)
    {
        if ($this->isChild()) {

            // This is the route configuration as a child
            // $collection->clearExcept(['create', 'show', 'edit']);
            return;
        }

        // This is the route configuration as a parent
        $collection->clear();

    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->tab('Basic Data', array('class' => 'col-md-6'))
                ->with('Content', array('class' => 'col-md-4'))
                    ->add('fullName', 'text')
                    ->add('shortName', 'text')
                    ->add('floorNumber', 'integer')
                    ->add('apartmentNumber', 'text')
                    ->end()

                    ->with('Meta data', array('class' => 'col-md-6'))
            /*
                    ->add('building', 'sonata_type_model', array(
                        'class' => 'AppBundle\Entity\Building',
                        'btn_add' => false
                    ))
            */
                    ->add('apartmentType', 'sonata_type_model', array(
                        'class' => 'AppBundle\Entity\ApartmentType',
                        'btn_add' => false
                    ))
                ->end()
            ->end()
            ->tab('Details')
                ->with('Rooms', array('class' => 'col-md-6'))
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
            ->addIdentifier('shortName')
            // ->add('building')
            ->add('apartmentType')
            ->add('floorNumber')
            ->add('apartmentNumber')
        ;
    }
}

