<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use App\Entity\Category;

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
            ->setTitle('仓库管理系统')
            ->setTranslationDomain('admin')
        ;
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('数据统计', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        
        yield MenuItem::subMenu('仓库管理 ', 'fa fa-tags')->setSubItems([
            MenuItem::linkToCrud('1号仓库', '', Category::class),
            MenuItem::linkToCrud('2号仓库', '', Category::class),
        ]);

        yield MenuItem::subMenu('物品管理 ', 'fa fa-tags')->setSubItems([
            MenuItem::linkToCrud('物品分类', '', Category::class),
            MenuItem::linkToCrud('物品列表', '', Category::class),
        ]);

        yield MenuItem::subMenu('物品领用', 'fa fa-tags')->setSubItems([
            MenuItem::linkToCrud('新建出库单', '', Category::class),
            MenuItem::linkToCrud('物品使用中', '', Category::class),
            MenuItem::linkToCrud('物品归还', '', Category::class),
        ]);

        yield MenuItem::subMenu('仓库日志', 'fa fa-tags')->setSubItems([
            MenuItem::linkToCrud('入库', '', Category::class),
            MenuItem::linkToCrud('领用', '', Category::class),
            MenuItem::linkToCrud('归还', '', Category::class),
            MenuItem::linkToCrud('损耗', '', Category::class),
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
}
