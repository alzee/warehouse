<?php

namespace App\Controller\Admin;

use App\Entity\Neo;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class NeoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Neo::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
