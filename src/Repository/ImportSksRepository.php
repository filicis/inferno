<?php

namespace App\Repository;

use App\Entity\ImportSks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ImportSks|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImportSks|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImportSks[]    findAll()
 * @method ImportSks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImportSksRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ImportSks::class);
    }

    // /**
    //  * @return ImportSks[] Returns an array of ImportSks objects
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
    public function findOneBySomeField($value): ?ImportSks
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
