<?php
namespace App\Service;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
class UserService
{
    private EntityManagerInterface $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function saveUser(User $user)
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
    public function deleteUser(User $user)
    {
        $this->entityManager->remove($user);
        $this->entityManager->flush();
    }
}