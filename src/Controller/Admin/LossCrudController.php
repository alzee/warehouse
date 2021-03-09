<?php

namespace App\Controller\Admin;

use App\Entity\Loss;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class LossCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Loss::class;
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
