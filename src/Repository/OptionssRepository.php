<?php

namespace App\Repository;

use App\Entity\Optionss;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Optionss|null find($id, $lockMode = null, $lockVersion = null)
 * @method Optionss|null findOneBy(array $criteria, array $orderBy = null)
 * @method Optionss[]    findAll()
 * @method Optionss[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OptionssRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Optionss::class);
    }

    // /**
    //  * @return Optionss[] Returns an array of Optionss objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Optionss
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
