<?php

namespace App\Repository;

use App\Entity\Taha;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Taha>
 *
 * @method Taha|null find($id, $lockMode = null, $lockVersion = null)
 * @method Taha|null findOneBy(array $criteria, array $orderBy = null)
 * @method Taha[]    findAll()
 * @method Taha[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TahaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Taha::class);
    }

//    /**
//     * @return Taha[] Returns an array of Taha objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Taha
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
