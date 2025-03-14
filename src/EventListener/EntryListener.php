<?php
namespace App\EventListener;

use App\Entity\Entry;
use Doctrine\Persistence\Event\LifecycleEventArgs;

class EntryListener
{
    public function postPersist(Entry $entry, LifecycleEventArgs $event): void
    {
        $item = $entry->getItem();
        $currentStock = $item->getStock();
        $item->setStock($currentStock + $entry->getQuantity());
        
        $em = $event->getEntityManager();
        $em->flush();
    }
}
