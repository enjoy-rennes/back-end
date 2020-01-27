<?php

namespace App\Repository;

use App\Entity\HousingHelp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method HousingHelp|null find($id, $lockMode = null, $lockVersion = null)
 * @method HousingHelp|null findOneBy(array $criteria, array $orderBy = null)
 * @method HousingHelp[]    findAll()
 * @method HousingHelp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HousingHelpRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HousingHelp::class);
    }

    // /**
    //  * @return HousingHelp[] Returns an array of HousingHelp objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HousingHelp
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
