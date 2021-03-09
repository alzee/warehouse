<?php

namespace App\Controller\Admin;

use App\Entity\Take;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class TakeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Take::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            AssociationField::new('item'),
            IntegerField::new('quantity'),
            DateTimeField::new('date')->onlyOnIndex(),
        ];
    }
}
