<?php
// src/AppBundle/Admin/AddressAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class MeterreadingAdmin extends BaseAdmin
{
    protected $parentAssociationMapping = 'meter';

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('meter')
            ->add('date')
            ->add('value')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('meter')
            ->add('date')
            ->add('value')
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('meter')
            ->add('date')
            ->add('value')
            ->add('createdAt')
            ->add('updatedAt')
        ;

        $listMapper->add('_action', 'actions', array(
            'actions' => array(
                'show' => array(),
                'edit' => array(),
            )
        ));
    }


    /**
     * @param ShowMapper $show
     */
    protected function configureShowFields(ShowMapper $show)
    {
        $show
            ->add('meter')
            ->add('date')
            ->add('value')
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }
}

