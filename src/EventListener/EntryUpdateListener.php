<?php
namespace App\EventListener;

use App\Entity\Entry;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;

class EntryUpdateListener
{
    public function postPersist(Entry $entry, LifecycleEventArgs $event): void
    {
        dd('fuck');
        $item = $entry->getItem();
        $currentStock = $item->getStock();
        $item->setStock($currentStock + $entry->getQuantity());
        
        $entityManager = $event->getEntityManager();
        $entityManager->flush();
    }
}
