<?php

namespace App\Controller\Admin;

use App\Entity\Zone;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ZoneCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Zone::class;
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
