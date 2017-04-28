<?php
// src/AppBundle/Admin/UserAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class LettingAdmin extends BaseAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Base data', array('class' => 'col-md-3'))
                ->add('apartment')
                ->add('dateStart', 'sonata_type_date_picker', array(
                    'dp_use_current' => true,
                    'format'=>'dd.MM.yyyy'
                ))
                ->add('dateEnd', 'sonata_type_date_picker', array(
                    'dp_use_current' => false,
                    'format'=>'dd.MM.yyyy'
                ))
                ->add('price')
                ->add('currency')
            ->end()
            ->with('Side Costs', array('class' => 'col-md-9'))
                ->add('lettingsidecosts', 'sonata_type_collection', array(
                    'by_reference' => true
                ), array(
                    'edit' => 'inline',
                    'inline' => 'table',
                    'sortable' => 'id',
                ))
            ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('apartment')
            ->add('dateStart')
            ->add('dateEnd')
            ->add('price')
            ->add('currency')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('_action', 'actions', array(
            'actions' => array(
                'show' => array(),
                'edit' => array(),
            )
        ));

        $listMapper
                ->addIdentifier('apartment')
                ->add('dateStart')
                ->add('dateEnd')
                ->add('price')
                ->add('currency')
                ->add('lettingsidecosts')
        ;
    }

    /**
     * @param ShowMapper $show
     */
    protected function configureShowFields(ShowMapper $show)
    {
        $show
            ->with('Base data', array('class' => 'col-md-3'))
                ->add('apartment')
                ->add('apartment.fullname')
                ->add('dateStart')
                ->add('dateEnd')
                ->add('price')
                ->add('currency')
            ->end()
            ->with('Side Costs', array('class' => 'col-md-9'))
                ->add('lettingsidecosts')
            ->end()
        ;
    }
}

