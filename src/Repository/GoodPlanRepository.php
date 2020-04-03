<?php

namespace App\Repository;

use App\Entity\GoodPlan;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method GoodPlan|null find($id, $lockMode = null, $lockVersion = null)
 * @method GoodPlan|null findOneBy(array $criteria, array $orderBy = null)
 * @method GoodPlan[]    findAll()
 * @method GoodPlan[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GoodPlanRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GoodPlan::class);
    }

    // /**
    //  * @return GoodPlan[] Returns an array of GoodPlan objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GoodPlan
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
