<?php
// src/AppBundle/Admin/AddressAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PersonAddressAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('person', 'sonata_type_model', array(
                'class' => 'AppBundle\Entity\Person',
            ))
            ->add('address', 'sonata_type_model', array(
                'class' => 'AppBundle\Entity\Address',
            ))
            ->add('addressType', 'sonata_type_model', array(
                'class' => 'AppBundle\Entity\AddressType',
            ))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('person')
            ->add('address')
            ->add('addressType')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('person')
            ->addIdentifier('address')
            ->addIdentifier('addressType')
        ;
    }
}

