<?php
// src/AppBundle/Admin/TenantAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class TenantAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('firstname', 'text')
            ->add('middlename', 'text')
            ->add('surname', 'text')
//            ->add('tenantAddresses', 'sonata_type_model', array(
//                'class' => 'AppBundle\Entity\Tenant',
//                'property' => 'tenantAddresses',
//            ))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('firstname')
            ->add('middlename')
            ->add('surname');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('firstname')
            ->addIdentifier('middlename')
            ->addIdentifier('surname');
    }
}

