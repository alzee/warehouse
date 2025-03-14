<?php
namespace App\EventListener;

use App\Entity\Loss;
use App\Entity\Item;
use Doctrine\Persistence\Event\LifecycleEventArgs;

class LossListener
{
    public function postPersist(Loss $loss, LifecycleEventArgs $event): void
    {
        $item = $loss->getItem();
        $currentStock = $item->getStock();
        $item->setStock($currentStock - $loss->getQuantity());
        
        $em = $event->getEntityManager();
        $em->flush();
    }
}
