<?php
// src/AppBundle/Admin/TenantAddressAdmin.php
namespace AppBundle\Admin;

use AppBundle\Entity\TenantAddress;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class TenantAddressAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('General')
            // ->add('enabled', null, array('required' => false))
            ->add('tenant', 'sonata_type_model_list', array(
                'btn_add'       => 'Add Tenant',      //Specify a custom label
                'btn_list'      => 'button.list',     //which will be translated
                'btn_delete'    => false,             //or hide the button.
                'btn_catalogue' => 'SonataNewsBundle' //Custom translation domain for buttons
            ), array(
                'placeholder' => 'No author selected'
            ))
//            ->with('Content')
//            ->add('title', 'text')
//            ->add('body', 'textarea')
//            ->end()

//            ->with('Meta data')
//            ->add('address', 'sonata_type_model', array(
//                'class' => 'AppBundle\Entity\Address',
//                'property' => 'address',
//            ))
//            ->with('Meta data')
//            ->add('addressType', 'sonata_type_model', array(
//                'class' => 'AppBundle\Entity\AddressType',
//                'property' => 'addressType',
//            ))
            ->end()
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('tenant')
            ->addIdentifier('address')
            ->addIdentifier('addressType');
    }

    public function toString($object)
    {
        return $object instanceof TenantAddress
            ? $object->getId()
            : 'TenantAdress xxx'; // shown in the breadcrumb on the create view
    }
}

