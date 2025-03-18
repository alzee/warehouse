<?php
namespace App\EventListener;

use App\Entity\Out;
use App\Entity\Item;
use Doctrine\Persistence\Event\LifecycleEventArgs;

class OutListener
{
    public function postPersist(Out $out, LifecycleEventArgs $event): void
    {
        $item = $out->getItem();
        $currentStock = $item->getStock();
        $item->setStock($currentStock - $out->getQuantity());
        
        $em = $event->getEntityManager();
        $em->flush();
    }

    public function postUpdate(Out $out, LifecycleEventArgs $event): void
    {
        $em = $event->getEntityManager();
        $em->flush();
    }
}
