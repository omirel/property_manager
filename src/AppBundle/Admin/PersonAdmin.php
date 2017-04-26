<?php
// src/AppBundle/Admin/PersonAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PersonAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Content', array('class' => 'col-md-6'))
            ->add('firstname', 'text')
            ->add('middlename', 'text')
            ->add('surname', 'text')
            ->add('gender', 'text')
            ->add('dateOfBirth', 'date')
            ->end()
            ->with('Meta', array('class' => 'col-md-6'))
//            ->add('addresses', 'sonata_type_model', array(
//                'class' => 'AppBundle\Entity\PersonAddress',
//                // 'property' => 'zipOrPostcode',
//            ))
//            ->add('addresses', 'sonata_type_model', array(
//                'class' => 'AppBundle\Entity\PersonAddress',
//            ))
            ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('firstname')
            ->add('middlename')
            ->add('surname')
            ->add('gender')
            ->add('dateOfBirth')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('firstname')
            ->addIdentifier('middlename')
            ->addIdentifier('surname')
            ->addIdentifier('gender')
            ->addIdentifier('dateOfBirth')
        ;
    }
}

