<?php

namespace App\Repository;

use App\Entity\Addfirstname;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Addfirstname|null find($id, $lockMode = null, $lockVersion = null)
 * @method Addfirstname|null findOneBy(array $criteria, array $orderBy = null)
 * @method Addfirstname[]    findAll()
 * @method Addfirstname[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AddfirstnameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Addfirstname::class);
    }

    // /**
    //  * @return Addfirstname[] Returns an array of Addfirstname objects
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
    public function findOneBySomeField($value): ?Addfirstname
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
