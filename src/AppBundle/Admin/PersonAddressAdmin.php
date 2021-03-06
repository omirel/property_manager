<?php
// src/AppBundle/Admin/AddressAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class PersonAddressAdmin extends AbstractAdmin
{
    protected $parentAssociationMapping = 'person'; // This does the trick..

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
        if (!$this->isChild())
            $formMapper->add('person', 'sonata_type_model', array(
                'class' => 'AppBundle\Entity\Person',
            ));

        $formMapper
            ->add('address', 'sonata_type_model', array(
                'class' => 'AppBundle\Entity\Address',
                'btn_add' => 'add new address',
            ))
            ->add('addressType', 'sonata_type_model', array(
                'class' => 'AppBundle\Entity\AddressType',
                'btn_add' => false,
            ))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        if (!$this->isChild())
            $datagridMapper->add('person');

        $datagridMapper
            ->add('address')
            ->add('addressType')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        if (!$this->isChild())
            $listMapper->addIdentifier('person');

        $listMapper
            ->addIdentifier('address')
            ->addIdentifier('addressType')
        ;
    }
}

