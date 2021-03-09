<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ItemDistController extends AbstractDashboardController
{
    /**
     * @Route("/itemdist", name="item_dist")
     */
    public function index(): Response
    {
        //return parent::index();
        return $this->render('item_dist.html.twig');
    }
}
