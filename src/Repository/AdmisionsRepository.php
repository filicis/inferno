<?php

namespace App\Repository;

use App\Entity\Admisions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Admisions|null find($id, $lockMode = null, $lockVersion = null)
 * @method Admisions|null findOneBy(array $criteria, array $orderBy = null)
 * @method Admisions[]    findAll()
 * @method Admisions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdmisionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Admisions::class);
    }

    // /**
    //  * @return Admisions[] Returns an array of Admisions objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Admisions
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
