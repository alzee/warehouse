<?php

namespace App\Controller\Admin;

use App\Entity\Out;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Doctrine\ORM\EntityManagerInterface;

class Out2CrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Out::class;
    }

    public function configureFields(string $pageName): iterable
    {
        if ($pageName === 'edit') {
            return [
                IdField::new('id')->onlyOnIndex(),
                AssociationField::new('item')->setFormTypeOption('disabled', true),
                IntegerField::new('quantity')->setFormTypeOption('disabled', true),
                TextField::new('who', 'Taker')->setFormTypeOption('disabled', true),
                TextareaField::new('note'),
                DateTimeField::new('createdAt', 'Out At')->setFormTypeOption('disabled', true),
                DateTimeField::new('backAt'),
            ];
        }

        return [
            IdField::new('id')->onlyOnIndex(),
            AssociationField::new('item'),
            IntegerField::new('quantity'),
            TextField::new('who', 'Taker'),
            TextareaField::new('note'),
            DateTimeField::new('createdAt', 'Out At')->onlyOnIndex(),
            DateTimeField::new('createdAt', 'Out At')->onlyWhenCreating(),
            DateTimeField::new('backAt')->onlyOnIndex(),
            DateTimeField::new('backAt')->onlyWhenUpdating(),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::DELETE)
            // ->update(Crud::PAGE_INDEX, Action::EDIT, fn (Action $action) => $action->displayIf(fn ($entity) => (null === $entity->getBackAt())))
        ;
    }

    // public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    // {

    //     // $entityInstance->setBackAt(new \DateTimeImmutable());

    //     parent::updateEntity($entityManager, $entityInstance);
    // }
}
