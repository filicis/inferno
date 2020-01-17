<?php

namespace App\Repository;

use App\Entity\Skstable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
// use Symfony\Bridge\Doctrine\RegistryInterface;
use  Doctrine\Persistence\ManagerRegistry;


/**
 * @method Skstable|null find($id, $lockMode = null, $lockVersion = null)
 * @method Skstable|null findOneBy(array $criteria, array $orderBy = null)
 * @method Skstable[]    findAll()
 * @method Skstable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SkstableRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Skstable::class);
    }

    // /**
    //  * @return Skstable[] Returns an array of Skstable objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Skstable
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
