<?php

namespace App\Controller\Admin;

use App\Entity\Back;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BackCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Back::class;
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
