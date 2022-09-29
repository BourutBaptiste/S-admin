<?php

namespace App\Repository;

use App\Entity\Stats;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr\Select;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Stats>
 *
 * @method Stats|null find($id, $lockMode = null, $lockVersion = null)
 * @method Stats|null findOneBy(array $criteria, array $orderBy = null)
 * @method Stats[]    findAll()
 * @method Stats[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Stats::class);
    }

    public function save(Stats $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Stats $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Stats[] Returns an array of Stats objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Stats
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
    public function GetCATotal(): ?Array
    {
return $this->createQueryBuilder('s')
                ->Select("SUM(s.ChiffreAffaire)")
                ->getQuery()
                ->getResult();
    }
    public function GetCoutTotal(): ?Array
    {
return $this->createQueryBuilder('s')
                ->Select("SUM(s.MatierePremiere)")
                ->getQuery()
                ->getResult();
    }
    public function GetBenefTotal(): ?Array
    {
return $this->createQueryBuilder('s')
                ->Select("SUM(s.Benefice)")
                ->getQuery()
                ->getResult();
    }
    public function GetBenefTotalByAgence($AgenceId): ?Array
    {
return $this->createQueryBuilder('s')
                ->select("SUM(s.Benefice)")
                ->where("s.AgenceId = :idAgence")
                ->setParameter("idAgence", $AgenceId)
                ->getQuery()
                ->getResult();
    }
    public function GetMatierePremiereTotalByAgence($AgenceId): ?Array
    {
return $this->createQueryBuilder('s')
                ->select("SUM(s.MatierePremiere)")
                ->where("s.AgenceId = :idAgence")
                ->setParameter("idAgence", $AgenceId)
                ->getQuery()
                ->getResult();
    }
    public function GetCATotalByAgence($AgenceId): ?Array
    {
return $this->createQueryBuilder('s')
                ->select("SUM(s.ChiffreAffaire)")
                ->where("s.AgenceId = :idAgence")
                ->setParameter("idAgence", $AgenceId)
                ->getQuery()
                ->getResult();
    }
    public function GetNbrAgence(): ?Array
    {
return $this->createQueryBuilder('s')
                ->select("count(distinct s.AgenceId)")
                ->getQuery()
                ->getResult();
    }
    
    public function GetAllStats(): ?Array
    {
return $this->createQueryBuilder('s')
                ->select("SUM(s.ChiffreAffaire)","SUM(s.MatierePremiere)","SUM(s.Benefice)")
                ->groupBy("s.AgenceId")
                ->getQuery()
                ->getResult();
    }

    
}
