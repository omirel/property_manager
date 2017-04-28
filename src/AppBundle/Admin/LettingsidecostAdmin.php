<?php
// src/AppBundle/Admin/UserAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class LettingsidecostAdmin extends AbstractAdmin
{
    protected $parentAssociationMapping = 'letting';

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('letting')
            ->add('costType')
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
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('letting')
            ->add('costType')
            ->add('dateStart')
            ->add('dateEnd')
            ->add('price')
            ->add('currency')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('letting')
            ->add('costType')
            ->add('dateStart')
            ->add('dateEnd')
            ->add('price')
            ->add('currency')
        ;
    }
}

