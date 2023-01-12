<?php

namespace App\Repository;

use App\Entity\Gemmotherapy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Gemmotherapy>
 *
 * @method Gemmotherapy|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gemmotherapy|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gemmotherapy[]    findAll()
 * @method Gemmotherapy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GemmotherapyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gemmotherapy::class);
    }

    public function save(Gemmotherapy $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Gemmotherapy $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Gemmotherapy[] Returns an array of Gemmotherapy objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('g.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Gemmotherapy
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
