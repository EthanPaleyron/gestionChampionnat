<?php
namespace App\Service;
use App\Entity\Game;
use Doctrine\ORM\EntityManagerInterface;
class GameService
{
    private EntityManagerInterface $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function saveGame(Game $game)
    {
        $this->entityManager->persist($game);
        $this->entityManager->flush();
    }
    public function deleteGame(Game $game)
    {
        $this->entityManager->remove($game);
        $this->entityManager->flush();
    }
}