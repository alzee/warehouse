<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use App\Entity\Category;
use App\Entity\Item;
use App\Entity\Box;
use App\Entity\Log;
use App\Entity\Entry;
use App\Entity\Take;
use App\Entity\Back;
use App\Entity\Loss;
use App\Entity\Neo;
use App\Entity\Zone;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $doc = $this->getDoctrine();
        $stock0 = 0;
        $stock = 0;
        $entries = $doc->getRepository(Entry::class)->findAll();
        $logs = $doc->getRepository(Log::class)->findBy([], ['date' => 'DESC'], 50);

        foreach($entries as $entry){
            $stock0 += $entry->getQuantity();
            if($entry->getBox()->getStatus()){
                $stock += $entry->getQuantity();
            }

        }
        $using = $stock0 - $stock;

        $months = [];
        for($i = 5; $i >= 0; $i--){
            array_push($months, date("Y/m", strtotime("-$i month")));
        }
        $months = (array_flip($months));
        foreach($months as $k => $v){
            $months[$k] = 0;
        }

        foreach($logs as $log){
            $mon = $log->getDate()->format("Y/m");
            $boxId = $log->getBox();
            $items = [];

            foreach($entries as $entry){

                if($boxId == $entry->getBox()->getId()){
                    $item = $entry->getItem()->getName();
                    $unit = $entry->getItem()->getUnit();
                    $quan = $entry->getQuantity();
                    array_push($items, $item . ' ' . $quan . ' ' . $unit);
                    // only 出库
                    if(!$log->getDirection()){
                        $months[$mon] += $entry->getQuantity();
                    }
                }
            }
            $log->items= $items;
        }

        $data = [
            'stock0' => $stock0,
            'stock' => $stock,
            'using' => $using,
            'logs' => $logs,
            'months' => $months
        ];

        //return parent::index();
        return $this->render('dashboard.html.twig', $data);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('战备器材库信息化管理系统')
            ->setTranslationDomain('admin')
        ;
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('数据统计', 'fa fa-chart-bar');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        
        yield  MenuItem::linkToCrud('新增器材', 'fa fa-puzzle-piece', Item::class)->setAction('new');
        yield  MenuItem::linkToCrud('器材列表', 'fa fa-cogs', Item::class);
        yield  MenuItem::linkToCrud('器材箱列表', 'fa fa-box', Box::class);
        yield  MenuItem::linkToCrud('器材箱器材', 'fa fa-th', Entry::class);
        yield MenuItem::linkToCrud('进出记录', 'fa fa-people-carry', Log::class);

        /*
        yield MenuItem::subMenu('仓库管理 ', 'fa fa-tags')->setSubItems([
            MenuItem::linkToRoute('仓库统计', '', 'warehouse_stat'),
            MenuItem::linkToCrud('1号仓库', '', Category::class),
            MenuItem::linkToCrud('2号仓库', '', Category::class),
        ]);

        //yield MenuItem::linkToCrud('区域管理', 'fa fa-tags', Zone::class);

        yield MenuItem::subMenu('物品管理 ', 'fa fa-tags')->setSubItems([
            //MenuItem::linkToRoute('物品分布', '', 'item_dist'),
            //MenuItem::linkToCrud('物品类别', '', Category::class),
            MenuItem::linkToCrud('新增品名', '', Item::class)->setAction('new'),
            MenuItem::linkToCrud('物品列表', '', Item::class),
            MenuItem::linkToCrud('箱子列表', '', Box::class),
            MenuItem::linkToCrud('箱子物品', '', Entry::class),
            //MenuItem::linkToCrud('物品入库', '', Neo::class)->setAction('new'),
        ]);

        yield MenuItem::subMenu('物品领用', 'fa fa-tags')->setSubItems([
            MenuItem::linkToCrud('领用单', '', Take::class)->setAction('new'),
            MenuItem::linkToCrud('归还单', '', Back::class)->setAction('new'),
            MenuItem::linkToCrud('损耗单', '', Loss::class)->setAction('new'),
            // MenuItem::linkToCrud('使用中', '', Category::class),
        ]);

        yield MenuItem::subMenu('仓库日志', 'fa fa-tags')->setSubItems([
            MenuItem::linkToCrud('进出记录', '', Log::class),
            //MenuItem::linkToCrud('领用记录', '', Take::class),
            // MenuItem::linkToCrud('归还记录', '', Back::class),
            MenuItem::linkToCrud('损耗记录', '', Loss::class),
        ]);

        //yield MenuItem::linkToLogout('Logout', 'fa fa-exit');
         */
    }

    public function configureCrud(): Crud
    {
        return Crud::new()
            // this defines the pagination size for all CRUD controllers
            // (each CRUD controller can override this value if needed)
            ->setPaginatorPageSize(30)
        ;
    }

    public function configureActions(): Actions
    {
        return Actions::new()
            ->add(Crud::PAGE_INDEX, Action::NEW)
            ->add(Crud::PAGE_INDEX, Action::EDIT)
            ->add(Crud::PAGE_INDEX, Action::DELETE)
            ->add(Crud::PAGE_DETAIL, Action::EDIT)
            ->add(Crud::PAGE_DETAIL, Action::INDEX)
            ->add(Crud::PAGE_DETAIL, Action::DELETE)
            ->add(Crud::PAGE_EDIT, Action::SAVE_AND_RETURN)
            ->add(Crud::PAGE_NEW, Action::SAVE_AND_RETURN)
        ;
    }
}
