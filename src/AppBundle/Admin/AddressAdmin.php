<?php
// src/AppBundle/Admin/AddressAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class AddressAdmin extends BaseAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('line1', 'text')
//            ->add('line1', 'sonata_type_model_autocomplete', array(
//                'class' => 'AppBundle\Entity\Address',
//                'property' => 'line1'
//            ))
            ->add('line2', 'text')
            ->add('line3', 'text')
            ->add('zipOrPostcode', 'text')
            ->add('stateProvinceCounty', 'text')
            ->add('country', 'choice', array(
                'choices' => array(
                    'Ukraine' => 'UA',
                    'Germany' => 'DE',
                )
            ))
            ->add('otherAddressDetails', 'textarea')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('line1')
            ->add('line2')
            ->add('line3')
            ->add('zipOrPostcode')
            ->add('stateProvinceCounty')
            ->add('country')
            ->add('otherAddressDetails')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('line1')
            ->add('line2')
            ->add('line3')
            ->add('zipOrPostcode')
            ->add('stateProvinceCounty')
            ->add('country', 'choice', array(
                'choices' => array(
                    'DE' => 'Germany',
                    'UA' => 'Ukraine',
                ),
                'catalogue' => 'AppBundle'
            ))
            ->add('createdAt')
            ->add('otherAddressDetails', 'text', array(
                'header_style' => 'width: 35%',
                'collapse' => array(
                    'height' => 40, // height in px
                    'read_more' => 'I want to see the full description', // content of the "read more" link
                    'read_less' => 'This text is too long, reduce the size' // content of the "read less" link
                )
            ))
        ;
    }
}

