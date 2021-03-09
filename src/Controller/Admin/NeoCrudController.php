<?php

namespace App\Controller\Admin;

use App\Entity\Neo;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class NeoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Neo::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('quantity'),
            AssociationField::new('category'),
            AssociationField::new('item'),
            AssociationField::new('zone'),
        ];
    }
}
