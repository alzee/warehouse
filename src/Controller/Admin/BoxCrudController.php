<?php

namespace App\Controller\Admin;

use App\Entity\Box;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Filter\BooleanFilter;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use App\Controller\Admin\EntryCrudController;

class BoxCrudController extends AbstractCrudController
{
    private $adminUrlGenerator;

    public function __construct(AdminUrlGenerator $adminUrlGenerator)
    {
        $this->adminUrlGenerator = $adminUrlGenerator;
    }

    public static function getEntityFqcn(): string
    {
        return Box::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            BooleanField::new('status', 'isHome')->renderAsSwitch(0),
            TextField::new('category'),
            TextField::new('barcode'),
            TextField::new('location'),
            BooleanField::new('isItem')->hideOnIndex(),
        ];
    }

    public function boxEntries(AdminContext $context)
    {
        $id = $context->getEntity()->getInstance()->getId();
        $url = $this->adminUrlGenerator
            ->setController(EntryCrudController::class)
            ->setAction(Action::INDEX)
            ->set('filters', ['box'=> $id])
            ->generateUrl();
        return $this->redirect($url . '&filters%5Bbox%5D%5Bcomparison%5D=%3D&filters%5Bbox%5D%5Bvalue%5D=' . $id);
    }

    public function configureActions(Actions $actions): Actions
    {
        $boxEntries = Action::new('boxEntries', 'boxEntries')->linkToCrudAction('boxEntries');

        return $actions
            ->add(Crud::PAGE_INDEX, $boxEntries);
            //->add(Crud::PAGE_EDIT, Action::SAVE_AND_ADD_ANOTHER)
        ;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            //->setPageTitle('index', '%entity_label_plural% list');
            ->setPageTitle('detail', fn (Box $box) => (string) $box . '号箱子')
            ->overrideTemplate('crud/field/boolean', 'field_direction_box.html.twig')
            ;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(BooleanFilter::new('status'))
        ;
    }
}
