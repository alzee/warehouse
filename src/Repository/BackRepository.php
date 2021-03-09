<?php

namespace App\Repository;

use App\Entity\Back;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Back|null find($id, $lockMode = null, $lockVersion = null)
 * @method Back|null findOneBy(array $criteria, array $orderBy = null)
 * @method Back[]    findAll()
 * @method Back[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BackRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Back::class);
    }

    // /**
    //  * @return Back[] Returns an array of Back objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Back
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
