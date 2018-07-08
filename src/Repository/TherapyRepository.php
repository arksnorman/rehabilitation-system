<?php

namespace App\Repository;

use App\Entity\Therapy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Therapy|null find($id, $lockMode = null, $lockVersion = null)
 * @method Therapy|null findOneBy(array $criteria, array $orderBy = null)
 * @method Therapy[]    findAll()
 * @method Therapy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TherapyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Therapy::class);
    }

//    /**
//     * @return Therapy[] Returns an array of Therapy objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Therapy
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
