<?php
// src/AppBundle/Admin/BuildingAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class BuildingAdmin extends AbstractAdmin
{
    public $supportsPreviewMode = true;

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->tab('Building', array('class' => 'col-md-6'))
                ->with('Basic Data', array('class' => 'col-md-6'))
                    ->add('fullName', 'text')
                    ->add('shortName', 'text')
                ->end()
                ->with('Location', array('class' => 'col-md-6'))
                    ->add('address', 'sonata_type_model', array(
                        'class' => 'AppBundle\Entity\Address',
                    ))
                ->end()
            ->end()
            ->tab('Apartments', array('class' => 'col-md-6'))
//                ->add('apartments', 'sonata_type_collection')
                ->add('apartments',
                'sonata_type_collection',
                array(
                    'btn_add' => 'Add new Apartment',
                ), array(
                    'edit' => 'inline',
                    'inline' => 'table',
//                    'sortable' => 'position',
                )
            )
            ->end()
        ;

//        $subject = $this->getSubject();
//
//        if ($subject->isNew()) {
//            // The thumbnail field will only be added when the edited item is created
//            $formMapper->add('thumbnail', 'file');
//        }
//
//        // Name field will be added only when create an item
//        if ($this->isCurrentRoute('create')) {
//            $formMapper->add('name', 'text');
//        }
//
//        // The foo field will added when current action is related acme.demo.admin.code Admin's edit form
//        if ($this->isCurrentRoute('edit', 'acme.demo.admin.code')) {
//            $formMapper->add('foo', 'text');
//        }
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
            ->add('address')
            ->add('apartments')
        ;

        $listMapper->add('_action', 'actions', array(
            'actions' => array(
                'show' => array(),
                'edit' => array(),
                'apartments' => array(
                    'template' => 'list__action_apartments.html.twig',
                )
            )
        ));
    }
}

