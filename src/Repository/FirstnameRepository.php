<?php

namespace App\Repository;

use App\Entity\Firstname;
use App\Search\Search;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Firstname|null find($id, $lockMode = null, $lockVersion = null)
 * @method Firstname|null findOneBy(array $criteria, array $orderBy = null)
 * @method Firstname[]    findAll()
 * @method Firstname[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FirstnameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Firstname::class);
    }

    //function système de recherche
    public function findByFirstname(Search $search)
    {
        $qb = $this->createQueryBuilder('f')
            ->where('f.firstname LIKE :keyword')
            ->setParameter('keyword', '%' . $search->getKeyword() . '%');

        if ($search->getOrigins()) {
            $qb->leftJoin('f.origin', 'o')
                ->addSelect('o');
            $qb->andWhere('o.name = :origins')
                ->setParameter('origins', $search->getOrigins());

        }
        $qb->orderBy('f.firstname', 'ASC');
        return $qb->getQuery()->getResult();

    }

    // /**
    //  * @return Firstname[] Returns an array of Firstname objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Firstname
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
