<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class CategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Category::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // the visible title at the top of the page and the content of the <title> element
            // it can include these placeholders: %entity_id%, %entity_label_singular%, %entity_label_plural%
            ->setPageTitle('index', '%entity_label_plural% listing')

        // you can pass a PHP closure as the value of the title
            ->setPageTitle('new', fn () => new \DateTime('now') > new \DateTime('today 13:00') ? 'New dinner' : 'New lunch')

        // in DETAIL and EDIT pages, the closure receives the current entity
        // as the first argument
            ->setPageTitle('detail', fn (Product $product) => (string) $product)
            ->setPageTitle('edit', fn (Category $category) => sprintf('Editing <b>%s</b>', $category->getName()))

        // the help message displayed to end users (it can contain HTML tags)
            ->setHelp('edit', '...')
            ->setSearchFields(null)
        ;
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
