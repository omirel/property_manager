<?php
// src/AppBundle/Admin/BuildingAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Knp\Menu\ItemInterface as MenuItemInterface;
use Sonata\AdminBundle\Admin\AdminInterface;

class BuildingAdmin extends AbstractAdmin
{
    public $supportsPreviewMode = true;

    protected function configureSideMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null)
    {
        if (!$childAdmin && !in_array($action, array('edit'))) {
            return;
        }
        $admin = $this->isChild() ? $this->getParent() : $this;
        $id = $admin->getRequest()->get('id');

        $menu->addChild(
            $this->trans('Building Details'),
            array('uri' => $admin->generateUrl('edit', array('id' => $id)))
        );

        $menu->addChild(
            $this->trans('Apartments'),
            array('uri' => $admin->getRouteGenerator()->generate('admin_app_building_apartment_list', array('id' => $id)))
        );
    }

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
            /*
            ->tab('Apartments', array('class' => 'col-md-6'))
                ->add('apartments',
                'sonata_type_collection',
                array(
                    'btn_add' => 'Add new Apartment',
                ), array(
                    // 'by_reference' => true,
                    'edit' => 'inline',
                    'inline' => 'table',
                    'sortable'  => 'position'
                )
            )
            ->end()
            */
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
            ->add('address')
            ->add('apartments')
        ;

        $listMapper->add('_action', 'actions', array(
            'actions' => array(
                'show' => array(),
                'edit' => array(),
                'create' => array(
                    'template' => 'list__action_apartments.html.twig',
                )
            )
        ));
    }

    /**
     * @param ShowMapper $show
     */
    protected function configureShowFields(ShowMapper $show)
    {
        $show
            ->add('fullName')
            ->add('shortName')
            ->add('address')
            ->add('apartments')
        ;
    }
}

