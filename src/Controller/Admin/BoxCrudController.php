<?php

namespace App\Controller\Admin;

use App\Entity\Box;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;

class BoxCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Box::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('category'),
        ];
    }

    public function boxEntries(AdminContext $context)
    {
        $id = $context->getEntity()->getInstance()->getId();
        return $this->redirect('http://warehouse/admin?referrer=%2Fadmin%3FcrudAction%3Dindex%26crudControllerFqcn%3DApp%255CController%255CAdmin%255CEntryCrudController%26menuIndex%3D1%26signature%3DaiE8iHC8HTQiY4X8doxA0ZDCcg_f17Rpqm8K9m2DlX0%26submenuIndex%3D3&crudAction=index&crudControllerFqcn=App%5CController%5CAdmin%5CEntryCrudController&menuIndex=1&signature=aiE8iHC8HTQiY4X8doxA0ZDCcg_f17Rpqm8K9m2DlX0&submenuIndex=3&filters%5Bbox%5D%5Bcomparison%5D=%3D&filters%5Bbox%5D%5Bvalue%5D=' . $id);
    }

    public function configureActions(Actions $actions): Actions
    {
        $boxEntries = Action::new('boxEntries', 'entries')->linkToCrudAction('boxEntries');

        return $actions
            ->add(Crud::PAGE_INDEX, $boxEntries);
            //->add(Crud::PAGE_EDIT, Action::SAVE_AND_ADD_ANOTHER)
        ;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            //->setPageTitle('index', '%entity_label_plural% list');
            ->setPageTitle('detail', fn (Box $box) => (string) $box . '号箱子');
            ;
    }
}
