<?php

namespace App\Repository;

use App\Entity\Requierement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Requierement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Requierement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Requierement[]    findAll()
 * @method Requierement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RequierementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Requierement::class);
    }

    // /**
    //  * @return Requierement[] Returns an array of Requierement objects
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
    public function findOneBySomeField($value): ?Requierement
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
