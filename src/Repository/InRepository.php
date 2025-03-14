<?php

namespace App\Repository;

use App\Entity\In;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method In|null find($id, $lockMode = null, $lockVersion = null)
 * @method In|null findOneBy(array $criteria, array $orderBy = null)
 * @method In[]    findAll()
 * @method In[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, In::class);
    }

    // /**
    //  * @return In[] Returns an array of In objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?In
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
