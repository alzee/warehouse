<?php
namespace App\EventListener;

use App\Entity\In;
use App\Entity\Item;
use Doctrine\Persistence\Event\LifecycleEventArgs;

class InListener
{
    public function postPersist(In $in, LifecycleEventArgs $event): void
    {
        $item = $in->getItem();
        $currentStock = $item->getStock();
        $item->setStock($currentStock + $in->getQuantity());
        
        $em = $event->getEntityManager();
        $em->flush();
    }
}
