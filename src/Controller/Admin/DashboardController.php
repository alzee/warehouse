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
        yield MenuItem::linktoDashboard('首页', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        
        yield MenuItem::section('Section A');
        yield MenuItem::linktoCrud('类别', 'fa fa-home', Category::class);
        yield MenuItem::linkToCrud('Add Category', 'fa fa-tags', Category::class)->setAction('new');
        yield MenuItem::linkToCrud('Show Main Category', 'fa fa-tags', Category::class)->setAction('detail');
        yield MenuItem::linkToCrud('Show Main Category', 'fa fa-tags', Category::class)->setAction('detail')->setEntityId(1);

        yield MenuItem::section('Section B');
        yield MenuItem::linktoCrud('类别', 'fa fa-home', Category::class);

        yield MenuItem::subMenu('Blog', 'fa fa-article')->setSubItems([
            MenuItem::linkToCrud('Categories', 'fa fa-tags', Category::class),
            MenuItem::linkToCrud('Categories', 'fa fa-tags', Category::class),
        ]);

        yield MenuItem::section('Section Z');
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
