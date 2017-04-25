<?php
// src/AppBundle/Admin/AddressAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class AddressAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('line1', 'text')
            ->add('line2', 'text')
            ->add('line3', 'text')
            ->add('zipOrPostcode', 'text')
            ->add('stateProvinceCounty', 'text')
            ->add('country', 'text')
            ->add('otherAddressDetails', 'text')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('line1')
            ->add('line2')
            ->add('line3')
            ->add('zipOrPostcode')
            ->add('stateProvinceCounty')
            ->add('country')
            ->add('otherAddressDetails')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('line1')
            ->addIdentifier('line2')
            ->addIdentifier('line3')
            ->addIdentifier('zipOrPostcode')
            ->addIdentifier('stateProvinceCounty')
            ->addIdentifier('country')
            ->addIdentifier('otherAddressDetails')
        ;
    }
}

