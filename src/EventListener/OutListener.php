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
        $uow = $em->getUnitOfWork();
        $changeSet = $uow->getEntityChangeSet($out);
        // dump($changeSet);

        if (isset($changeSet['backAt'])) {
            if ($changeSet['backAt'][0] === null) {
                // dump('item back!');
                $item = $out->getItem();
                $item->setStock($item->getStock() + $out->getQuantity());
                $em->flush();
            }
        }
    }
}
