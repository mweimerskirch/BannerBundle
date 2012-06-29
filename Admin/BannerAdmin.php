<?php
namespace Evercode\Bundle\BannerBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Evercode\Bundle\BannerBundle\Form\Extension\ChoiceList\BannerPlace;

class BannerAdmin extends Admin
{
    public function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('place')
            ->add('link')
            ->add('image')
        ;
    }

    public function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('place', 'sonata_type_translatable_choice', array(
                'choice_list' => new BannerPlace()
            ))
            ->add('link')
            ->add('file', 'file', array('required' => false))
        ;
    }

    public function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->addIdentifier('place')
            ->add('link')
        ;
    }

    public function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('place', null, array(), 'sonata_type_translatable_choice',
                array(
                    'choice_list' => new BannerPlace()
                )
            )
            ->add('link')
        ;
    }

}
