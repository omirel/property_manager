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
            ->with('Content', array('class' => 'col-md-6'))
            ->add('firstname', 'text')
            ->add('middlename', 'text')
            ->add('surname', 'text')
            ->add('gender', 'text')
            ->add('dateOfBirth', 'date')
            ->end()
            ->with('extra content', array(
                'class' => 'col-md-6',
                'box_class'   => 'box box-solid box-danger',
                'description' => 'Lorem ipsum',
            ))
            ->add('addresses')
//            ->add('addresses', 'sonata_type_model', array(
//                'class' => 'AppBundle\Entity\Person',
//            ))
//            ->add('addresses', 'entity', array(
//                'class' => 'AppBundle\Entity\PersonAddress'
//            ))
//            ->add('addresses', null, array(
//                'format' => 'Y-m-d H:i',
//                'timezone' => 'America/New_York'
//            ))
            // ->add('addresses')
//            ->add('addresses', 'sonata_type_model', array(
//                'class' => 'AppBundle\Entity\PersonAddress',
//                // 'property' => 'zipOrPostcode',
//            ))
//            ->add('addresses', 'sonata_type_model', array(
//                'class' => 'AppBundle\Entity\PersonAddress',
//                'property' => 'addresses.person',
//            ))
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
            $this->trans('admin.sidemenu.link_view_A'),
            array('uri' => $admin->generateUrl('edit', array('id' => $id)))
        );
        $menu->addChild(
            $this->trans('admin.sidemenu.link_view_AB'),
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
            ->addIdentifier('firstname')
            ->addIdentifier('middlename')
            ->addIdentifier('surname')
            ->addIdentifier('gender')
            ->addIdentifier('dateOfBirth')
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

