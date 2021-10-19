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

        return $this->json([
            'code' => 0
        ]);
    }
}
