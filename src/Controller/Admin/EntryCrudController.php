<?php

namespace App\Controller\Admin;

use App\Entity\Entry;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EntryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Entry::class;
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
