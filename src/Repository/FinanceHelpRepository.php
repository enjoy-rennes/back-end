<?php

namespace App\Repository;

use App\Entity\FinanceHelp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method FinanceHelp|null find($id, $lockMode = null, $lockVersion = null)
 * @method FinanceHelp|null findOneBy(array $criteria, array $orderBy = null)
 * @method FinanceHelp[]    findAll()
 * @method FinanceHelp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FinanceHelpRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FinanceHelp::class);
    }

    // /**
    //  * @return FinanceHelp[] Returns an array of FinanceHelp objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FinanceHelp
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
