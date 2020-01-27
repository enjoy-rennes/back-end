<?php

namespace App\Repository;

use App\Entity\TransportHelp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TransportHelp|null find($id, $lockMode = null, $lockVersion = null)
 * @method TransportHelp|null findOneBy(array $criteria, array $orderBy = null)
 * @method TransportHelp[]    findAll()
 * @method TransportHelp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransportHelpRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TransportHelp::class);
    }

    // /**
    //  * @return TransportHelp[] Returns an array of TransportHelp objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TransportHelp
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
