<?php
namespace App\Service;
use App\Entity\Team;
use Doctrine\ORM\EntityManagerInterface;
class TeamService
{
    private EntityManagerInterface $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function saveTeam(Team $team)
    {
        $this->entityManager->persist($team);
        $this->entityManager->flush();
    }
    public function deleteTeam(Team $team)
    {
        $this->entityManager->remove($team);
        $this->entityManager->flush();
    }
}