<?php

namespace App\Controller\Admin;

use App\Entity\Item;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;

class Item2CrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Item::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('name'),
            TextField::new('unit'),
            IntegerField::new('count'),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            // ->addBatchAction(Crud::PAGE_INDEX, $viewInvoice)
            ->remove(Crud::PAGE_INDEX, 'new')
        ;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->overrideTemplate('crud/index', 'count.html.twig')
            //->setPageTitle('index', '%entity_label_plural% list');
            ->setPageTitle('new', '新增品名');
            ;
    }
}
