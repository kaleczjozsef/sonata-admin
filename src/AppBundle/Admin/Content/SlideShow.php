<?php

namespace AppBundle\Admin\Content;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class SlideShow extends AbstractAdmin
{

    protected function configureFormFields(FormMapper $form)
    {
        $form->add('name', 'text');
        $form->add('text', 'text');
        $form->add('image', 'file', ['required' => false]);
        $form->add('status', ChoiceType::class, ["choices" => ['yes' => 'Active', 'no' => 'Inactive']]);

    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter->add('name');
        $filter->add('text');
        $filter->add('status');
    }

    protected function configureListFields(ListMapper $list)
    {
        $list->addIdentifier('name');
        $list->add('text');
    }
//
//    public function prePersist($image)
//    {
//        $this->manageFileUpload($image);
//    }
//
//    public function preUpdate($image)
//    {
//        $this->manageFileUpload($image);
//    }
//
//    private function manageFileUpload($image)
//    {
//        if ($image->getFile()) {
//            $image->refreshUpdate();
//        }
//    }
}