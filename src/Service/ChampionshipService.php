<?php
namespace App\Service;
use App\Entity\Championship;
use Doctrine\ORM\EntityManagerInterface;
class ChampionshipService
{
    private EntityManagerInterface $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function saveChampionship(Championship $championship)
    {
        $this->entityManager->persist($championship);
        $this->entityManager->flush();
    }
    public function deleteChampionship(Championship $championship)
    {
        $this->entityManager->remove($championship);
        $this->entityManager->flush();
    }
}