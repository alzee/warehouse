<?php

namespace App\Repository;

use App\Entity\Out;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Out|null find($id, $lockMode = null, $lockVersion = null)
 * @method Out|null findOneBy(array $criteria, array $orderBy = null)
 * @method Out[]    findAll()
 * @method Out[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OutRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Out::class);
    }

    // /**
    //  * @return Out[] Returns an array of Out objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Out
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
