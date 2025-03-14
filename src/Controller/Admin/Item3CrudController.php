<?php

namespace App\Controller\Admin;

use App\Entity\Item;
use App\Entity\Entry;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\SearchDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FilterCollection;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Orm\EntityRepository;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeCrudActionEvent;
use EasyCorp\Bundle\EasyAdminBundle\Security\Permission;
use EasyCorp\Bundle\EasyAdminBundle\Factory\ActionFactory;
use EasyCorp\Bundle\EasyAdminBundle\Factory\ControllerFactory;
use EasyCorp\Bundle\EasyAdminBundle\Factory\EntityFactory;
use EasyCorp\Bundle\EasyAdminBundle\Factory\FilterFactory;
use EasyCorp\Bundle\EasyAdminBundle\Factory\FormFactory;
use EasyCorp\Bundle\EasyAdminBundle\Factory\PaginatorFactory;
use EasyCorp\Bundle\EasyAdminBundle\Config\KeyValueStore;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterCrudActionEvent;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class Item3CrudController extends AbstractCrudController
{
    private $entityManager;
    private $adminUrlGenerator;

    public function __construct(
        EntityManagerInterface $entityManager,
        AdminUrlGenerator $adminUrlGenerator
    ) {
        $this->entityManager = $entityManager;
        $this->adminUrlGenerator = $adminUrlGenerator;
    }

    public static function getEntityFqcn(): string
    {
        return Item::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        $updateStock = Action::new('updateStock', 'Update All Stock')
            ->linkToCrudAction('updateAllStock')
            ->createAsGlobalAction()
            ->addCssClass('btn btn-primary')
            ->displayAsButton()
            ->setCssClass('btn btn-primary')
            ->setHtmlAttributes([
                'onclick' => 'return confirm("Are you sure you want to update all items stock to match count?")'
            ]);

        return $actions
            ->add(Crud::PAGE_INDEX, $updateStock)
            ->remove(Crud::PAGE_INDEX, 'new')
            ->remove(Crud::PAGE_INDEX, 'edit')
            ->remove(Crud::PAGE_INDEX, 'delete');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('name'),
            TextField::new('unit'),
            IntegerField::new('count'),
            IntegerField::new('stock', 'stock_in_record'),
            IntegerField::new('diff'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->overrideTemplate('crud/index', 'count_stat.html.twig')
            ->setPageTitle('index', '盘点统计');
    }

    public function updateAllStock()
    {
        $items = $this->entityManager->getRepository(Item::class)->findAll();
        foreach ($items as $item) {
            $item->setStock($item->getCount());
        }
        
        $this->entityManager->flush();
        $this->addFlash('success', 'All items stock updated to match count.');

        return $this->redirect($this->adminUrlGenerator
            ->setController(self::class)
            ->setAction('index')
            ->generateUrl());
    }
}
