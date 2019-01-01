<?php

namespace App\Repository;

use App\Entity\Lindicap;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Lindicap|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lindicap|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lindicap[]    findAll()
 * @method Lindicap[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LindicapRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Lindicap::class);
    }

    // /**
    //  * @return Lindicap[] Returns an array of Lindicap objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Lindicap
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
