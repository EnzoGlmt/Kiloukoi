<?php

namespace App\Repository;

use App\Entity\Outils;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Outils|null find($id, $lockMode = null, $lockVersion = null)
 * @method Outils|null findOneBy(array $criteria, array $orderBy = null)
 * @method Outils[]    findAll()
 * @method Outils[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OutilsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Outils::class);
    }

    // /**
    //  * @return Outils[] Returns an array of Outils objects
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
    public function findOneBySomeField($value): ?Outils
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
