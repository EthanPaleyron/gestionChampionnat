<?php
namespace App\Service;
use App\Entity\Country;
use Doctrine\ORM\EntityManagerInterface;
class CountryService
{

    private EntityManagerInterface $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function saveCountry(Country $country)
    {
        $this->entityManager->persist($country);
        $this->entityManager->flush();
    }
    public function deleteCountry(Country $country)
    {
        $this->entityManager->remove($country);
        $this->entityManager->flush();
    }
}