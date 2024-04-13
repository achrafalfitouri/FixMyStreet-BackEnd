<?php

namespace App\Repository;

use App\Entity\Reclamant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Reclamant>
 *
 * @method Reclamant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reclamant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reclamant[]    findAll()
 * @method Reclamant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReclamantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reclamant::class);
    }

//    /**
//     * @return Reclamant[] Returns an array of Reclamant objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Reclamant
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
