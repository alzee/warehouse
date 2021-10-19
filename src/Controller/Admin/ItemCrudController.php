<?php

namespace App\Controller\Admin;

use App\Entity\Item;
use App\Entity\Entry;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
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

class ItemCrudController extends AbstractCrudController
{
        /*
    public function configureActions(Actions $actions): Actions
    {
        $viewInvoice = Action::new('viewInvoice')
            ->linkToCrudAction('Dashboard')
            ;

        return $actions
            ->addBatchAction(Crud::PAGE_INDEX, $viewInvoice);
    }
         */

    public static function getEntityFqcn(): string
    {
        return Item::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('name'),
            TextField::new('unit'),
            IntegerField::new('stock')->onlyOnIndex(),
            IntegerField::new('stock0')->onlyOnIndex(),
            //AssociationField::new('entries'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->overrideTemplate('crud/index', 'items.html.twig')
            //->setPageTitle('index', '%entity_label_plural% list');
            ->setPageTitle('new', '新增品名');
            ;
    }

    public function createIndexQueryBuilder(SearchDto $searchDto, EntityDto $entityDto, FieldCollection $fields, FilterCollection $filters): QueryBuilder
    {
        return $this->get(EntityRepository::class)->createQueryBuilder($searchDto, $entityDto, $fields, $filters);
    }

    public function index(AdminContext $context)
    {
        $event = new BeforeCrudActionEvent($context);
        $this->get('event_dispatcher')->dispatch($event);
        if ($event->isPropagationStopped()) {
            return $event->getResponse();
        }

        /*
        if (!$this->isGranted(Permission::EA_EXECUTE_ACTION)) {
            throw new ForbiddenActionException($context);
        }
         */

        $fields = FieldCollection::new($this->configureFields(Crud::PAGE_INDEX));
        $filters = $this->get(FilterFactory::class)->create($context->getCrud()->getFiltersConfig(), $fields, $context->getEntity());
        $queryBuilder = $this->createIndexQueryBuilder($context->getSearch(), $context->getEntity(), $fields, $filters);
        $paginator = $this->get(PaginatorFactory::class)->create($queryBuilder);

        $entities = $this->get(EntityFactory::class)->createCollection($context->getEntity(), $paginator->getResults());

        // $em = $this->getDoctrine()->getManager();
        foreach($entities as $v){
            // dump($v->getInstance()->setStock($stock));
            $itemId = $v->getInstance()->getId();
            // dump($itemId);
            $entries = $this->getDoctrine()->getRepository(Entry::class)->findBy(['item'=> $itemId]);
            // dump($entries);
            $stock = 0;
            $stock0 = 0;
            foreach($entries as $entry){
               //dump($entry);
               $stock0 += $entry->getQuantity();
               if($entry->getBox()->getStatus()){
                   $stock += $entry->getQuantity();
               }
               //foreach($entry as $vv){
               //    dump($vv);
               //}
            }
            // dump($quan);
            $v->getInstance()->setStock0($stock0);
            $v->getInstance()->setStock($stock);
        };

        $this->get(EntityFactory::class)->processFieldsForAll($entities, $fields);
        $globalActions = $this->get(EntityFactory::class)->processActionsForAll($entities, $context->getCrud()->getActionsConfig());

        $responseParameters = $this->configureResponseParameters(KeyValueStore::new([
            'pageName' => Crud::PAGE_INDEX,
            'templateName' => 'crud/index',
            'entities' => $entities,
            'paginator' => $paginator,
            'global_actions' => $globalActions,
            'filters' => $filters,
            // 'batch_form' => $this->createBatchActionsForm(),
        ]));

        $event = new AfterCrudActionEvent($context, $responseParameters);
        $this->get('event_dispatcher')->dispatch($event);
        if ($event->isPropagationStopped()) {
            return $event->getResponse();
        }

        return $responseParameters;
    }
}
