<?php

namespace App\Repository;

use App\Entity\Afsnit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
// use Symfony\Bridge\Doctrine\RegistryInterface;
use  Doctrine\Persistence\ManagerRegistry;


/**
 * @method Afsnit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Afsnit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Afsnit[]    findAll()
 * @method Afsnit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AfsnitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Afsnit::class);
    }

//    /**
//     * @return Afsnit[] Returns an array of Afsnit objects
//     */
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
    public function findOneBySomeField($value): ?Afsnit
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
