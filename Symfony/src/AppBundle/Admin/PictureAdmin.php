<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PictureAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->tab('Picture')
                ->with('Content', array('class' => 'col-md-2'))
                    ->add('title', 'text')
                    ->add('text', 'text')
                    ->add('gallery', 'sonata_type_model', array(
                            'class' => 'AppBundle\Entity\Gallery',
                            'property' => 'name',
                        ))
                ->end()
                ->with('Meta Data', array('class' => 'col-md-3'))
                    ->add('src', 'text')
                    ->add('alt', 'text')
                    ->add('width', 'integer')
                    ->add('height', 'integer')
                ->end()
            ->end()
        ;


    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('title');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper

        ->addIdentifier('title')
        ->add('text')
        ->add('gallery', 'sonata_type_model', array(
            'class' => 'AppBundle\Entity\Gallery',
            'property' => 'name',
        ))

        ->add('src')
        ->add('alt')
        ->add('width')
        ->add('height')

        ;
    }
    public function toString($object)
    {
        return $object instanceof Picture
            ? $object->getTitle()
            : 'Picture';
    }
}