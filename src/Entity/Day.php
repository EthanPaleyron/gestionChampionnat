<?php

namespace App\Entity;

use App\Repository\DayRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DayRepository::class)]
class Day
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $number = null;

    #[ORM\Column]
    private ?int $idChampionship = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): static
    {
        $this->number = $number;

        return $this;
    }

    public function getIdChampionship(): ?int
    {
        return $this->idChampionship;
    }

    public function setIdChampionship(int $idChampionship): static
    {
        $this->idChampionship = $idChampionship;

        return $this;
    }

    #[ORM\OneToMany(targetEntity: Game::class, mappedBy: "day", cascade: ['persist', 'remove'])]
    private Collection $games;

    #[ORM\ManyToOne(targetEntity: Championship::class, inversedBy: "id_championship")]
    #[ORM\JoinColumn(name: "id_championship", referencedColumnName: "id")]
    private Championship $championship;
}
