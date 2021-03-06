<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WarehouseStatController extends AbstractDashboardController
{
    /**
     * @Route("/warehousestat", name="warehouse_stat")
     */
    public function index(): Response
    {
        //return parent::index();
        return $this->render('warehouse_stat.html.twig');
    }
}
