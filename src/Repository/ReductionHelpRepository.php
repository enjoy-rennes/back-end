<?php

namespace App\Repository;

use App\Entity\ReductionHelp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ReductionHelp|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReductionHelp|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReductionHelp[]    findAll()
 * @method ReductionHelp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReductionHelpRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReductionHelp::class);
    }

    // /**
    //  * @return ReductionHelp[] Returns an array of ReductionHelp objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ReductionHelp
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
