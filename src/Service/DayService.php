<?php
namespace App\Service;
use App\Entity\Day;
use Doctrine\ORM\EntityManagerInterface;
class DayService
{
    private EntityManagerInterface $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function saveDay(Day $day)
    {
        $this->entityManager->persist($day);
        $this->entityManager->flush();
    }
    public function deleteDay(Day $day)
    {
        $this->entityManager->remove($day);
        $this->entityManager->flush();
    }
}