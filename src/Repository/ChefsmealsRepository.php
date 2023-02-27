<?php

namespace App\Repository;

use App\Entity\Chefsmeals;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Chefsmeals>
 *
 * @method Chefsmeals|null find($id, $lockMode = null, $lockVersion = null)
 * @method Chefsmeals|null findOneBy(array $criteria, array $orderBy = null)
 * @method Chefsmeals[]    findAll()
 * @method Chefsmeals[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChefsmealsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Chefsmeals::class);
    }

    public function save(Chefsmeals $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Chefsmeals $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Chefsmeals[] Returns an array of Chefsmeals objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Chefsmeals
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
