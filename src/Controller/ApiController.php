<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Item;

/**
 * @Route("/api")
 */
class ApiController extends AbstractController
{
    /**
     * @Route("/clear_count", name="clear_count")
     */
    public function clear_count(): Response
    {
        $em = $this->getDoctrine()->getManager();

        $items = $em->getRepository(Item::class)->findAll();

        foreach ($items as $v) {
            $v->setCount(0);
        }
        $em->flush();

        return $this->redirect('/admin?crudAction=index&crudControllerFqcn=App%5CController%5CAdmin%5CItem2CrudController&entityFqcn=App%5CEntity%5CItem&menuIndex=6&signature=_1YMBtKZQvfeCkkyuhVTUIIHrGXjl9TRvOtd4G47wek&submenuIndex=-1');
    }
}
