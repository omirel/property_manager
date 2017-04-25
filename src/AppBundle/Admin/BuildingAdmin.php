<?php
// src/AppBundle/Admin/BuildingAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class BuildingAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Content', array('class' => 'col-md-6'))
            ->add('fullName', 'text')
            ->add('shortName', 'text')
//            ->add('address', 'sonata_type_model', array(
//                'class' => 'AppBundle\Entity\Address',
//                // 'property' => 'zipOrPostcode',
//            ))
            ->end()
            ->with('Meta data', array('class' => 'col-md-6'))
            ->add('address', 'sonata_type_model', array(
                'class' => 'AppBundle\Entity\Address',
                // 'property' => 'zipOrPostcode',
            ))
            ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('fullName')
            ->add('shortName')
            ->add('address')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('fullName')
            ->addIdentifier('shortName')
            ->addIdentifier('address')
        ;
    }
}

