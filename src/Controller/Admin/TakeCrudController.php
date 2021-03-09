<?php

namespace App\Controller\Admin;

use App\Entity\Take;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TakeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Take::class;
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
