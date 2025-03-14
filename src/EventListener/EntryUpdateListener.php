<?php
namespace App\EventListener;

use App\Entity\Entry;
use Doctrine\ORM\Event\PostPersistEventArgs;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Events;

#[AsEntityListener(event: Events::postPersist, entity: Entry::class)]
class EntryUpdateListener
{
    public function postPersist(Entry $entry, PostPersistEventArgs $event): void
    {
        $item = $entry->getItem();
        $currentStock = $item->getCount();
        $item->setCount($currentStock + $entry->getQuantity());
        
        $entityManager = $event->getObjectManager();
        // $entityManager = $event->getEntityManager();
        $entityManager->persist($item);
        $entityManager->flush();
    }
}
