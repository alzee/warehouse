<?php

namespace App\Controller\Admin;

use App\Entity\In;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class InCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return In::class;
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
