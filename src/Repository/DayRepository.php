<?php

namespace App\Repository;

use App\Entity\Day;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Day>
 */
class DayRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Day::class);
    }

    public function getAll(): array
    {
        return $this->findAll();
    }

    public function getAllFormIdChampionship(int $idChampionship): array
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.championship = :idChampionship')
            ->setParameter('idChampionship', $idChampionship)
            ->getQuery()
            ->getResult();
    }

    public function getById(int $id): ?Day
    {
        return $this->find($id);
    }
}
