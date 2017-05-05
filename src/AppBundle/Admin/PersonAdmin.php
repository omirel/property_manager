<?php
// src/AppBundle/Admin/PersonAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Knp\Menu\ItemInterface as MenuItemInterface;
use Sonata\AdminBundle\Admin\AdminInterface;

class PersonAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Content', array(
                'class' => 'col-md-6',
                'description' => 'This section contains general person settings...'
            ))
            ->add('image', 'sonata_type_model_list', array(),
                array('link_parameters' => array('context' => 'people'))
            )
            ->add('firstname', 'text')
            ->add('middlename', null, array(
                'help' => 'Set the middlename only of it exists'
            ))
            ->add('surname', 'text')
            ->add('gender', 'choice', array(
                'choices' => array(
                    'Male' => 'm',
                    'Female' => 'f',
                )
            ))
            ->add('dateOfBirth', 'date', array(
                'pattern' => 'dd MMM y G',
                'locale' => 'ru',
                'timezone' => 'Europe/Paris',
            ))
            ->end()
            ->with('Addresses & Communication', array(
                'class' => 'col-md-6',
                'box_class'   => 'box box-solid box-info',
                'description' => 'Lorem ipsum',
            ))
            ->add('addresses')
//            ->add('addresses',
//                'sonata_type_collection',
//                array(
//                    'btn_add' => 'add xxx',
//                ), array(
//                    'edit' => 'inline',
//                    'inline' => 'table',
//                    'sortable' => 'position',
//                )
//            )
            ->end()
        ;
    }

    protected function configureSideMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null)
    {
        if (!$childAdmin && !in_array($action, array('edit'))) {
            return;
        }
        $admin = $this->isChild() ? $this->getParent() : $this;
        $id = $admin->getRequest()->get('id');
        $menu->addChild(
            $this->trans('Person basic data'),
            array('uri' => $admin->generateUrl('edit', array('id' => $id)))
        );
        $menu->addChild(
            $this->trans('Person Address data'),
            array('uri' => $admin->generateUrl('admin.person_addresses.list', array('id' => $id)))
        );
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
            ->add('image', 'string',
                array('template' => 'SonataMediaBundle:MediaAdmin:list_image.html.twig')
            )
            ->addIdentifier('firstname')
            ->add('middlename')
            ->add('surname')
            ->add('gender', 'choice', array(
                'choices' => array(
                    'm' => 'Male',
                    'f' => 'Female',
                ),
                'catalogue' => 'AppBundle'
            ))
            ->add('dateOfBirth', null, array(
                'locale' => 'en',
                'timezone' => 'Europe/Paris',
            ))
            ->addIdentifier('addresses')
            ->add('_action', null, array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
//                    'clone' => array(
//                        'template' => 'AppBundle:CRUD:list__action_clone.html.twig'
//                    )
                )
            ))
        ;
    }

//    protected function configureShowFields(ShowMapper $filter)
//    {
//        $filter
//            ->add('user')
//            ->add('browser.id')
//            ->add('lastUsedAt')
//            ->add('browser.details')
//        ;
//    }
}

