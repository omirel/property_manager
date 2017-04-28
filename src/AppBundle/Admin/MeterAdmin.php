<?php
// src/AppBundle/Admin/AddressAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class MeterAdmin extends BaseAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Base data', array('class' => 'col-md-4'))
                ->add('meterType')
                ->add('number')
            ->end()
            ->with('Readings', array('class' => 'col-md-8'))
                ->add('meterreadings', 'sonata_type_collection', array(
                    'by_reference' => true
                ), array(
                    'edit' => 'inline',
                    'inline' => 'table',
                    'sortable' => 'id',
                ))
//                ->add('meterreadings', 'sonata_type_model', array(
//                        // 'multiple' => true,
//                        // 'by_reference' => false,
//                        'btn_add' => 'Write down reading'
//                    )
//                )
//                ->add('Meterreadings', 'sonata_type_model', array(
//                        'multiple' => true,
//                        // 'by_reference' => false,
//                        'btn_add' => 'Write down reading'
//                    )
//                )
            ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('meterType')
            ->add('number')
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('meterType')
            ->add('number')
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
            ->with('Base data', array('class' => 'col-md-4'))
                ->add('meterType')
                ->add('number')
                ->add('createdAt')
                ->add('updatedAt')
            ->end()
            ->with('Readings', array('class' => 'col-md-8'))
                ->add('meterreadings')
            ->end()
        ;
    }
}

