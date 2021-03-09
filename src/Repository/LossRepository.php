<?php

namespace App\Repository;

use App\Entity\Loss;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Loss|null find($id, $lockMode = null, $lockVersion = null)
 * @method Loss|null findOneBy(array $criteria, array $orderBy = null)
 * @method Loss[]    findAll()
 * @method Loss[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LossRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Loss::class);
    }

    // /**
    //  * @return Loss[] Returns an array of Loss objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Loss
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
