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
        //return parent::index();
        return $this->render('dashboard.html.twig');
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
        yield MenuItem::linktoDashboard('数据统计', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        
        /*
        yield MenuItem::subMenu('仓库管理 ', 'fa fa-tags')->setSubItems([
            MenuItem::linkToRoute('仓库统计', '', 'warehouse_stat'),
            MenuItem::linkToCrud('1号仓库', '', Category::class),
            MenuItem::linkToCrud('2号仓库', '', Category::class),
        ]);
         */

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
            MenuItem::linkToCrud('使用中', '', Category::class),
        ]);

        yield MenuItem::subMenu('仓库日志', 'fa fa-tags')->setSubItems([
            MenuItem::linkToCrud('入库记录', '', Neo::class),
            MenuItem::linkToCrud('领用记录', '', Take::class),
            MenuItem::linkToCrud('归还记录', '', Back::class),
            MenuItem::linkToCrud('损耗记录', '', Loss::class),
        ]);

        //yield MenuItem::linkToLogout('Logout', 'fa fa-exit');
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
