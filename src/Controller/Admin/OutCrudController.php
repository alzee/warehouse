<?php

namespace App\Controller\Admin;

use App\Entity\Out;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class OutCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Out::class;
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
