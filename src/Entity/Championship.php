<?php

namespace App\Entity;

use App\Repository\ChampionshipRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: ChampionshipRepository::class)]
class Championship
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $startDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $endDate = null;

    #[ORM\Column]
    private ?int $wonPoint = null;

    #[ORM\Column]
    private ?int $drawPoint = null;

    #[ORM\Column(length: 255)]
    private ?string $typeRanking = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): static
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): static
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getWonPoint(): ?int
    {
        return $this->wonPoint;
    }

    public function setWonPoint(int $wonPoint): static
    {
        $this->wonPoint = $wonPoint;

        return $this;
    }

    public function getDrawPoint(): ?int
    {
        return $this->drawPoint;
    }

    public function setDrawPoint(int $drawPoint): static
    {
        $this->drawPoint = $drawPoint;

        return $this;
    }

    public function getTypeRanking(): ?string
    {
        return $this->typeRanking;
    }

    public function setTypeRanking(string $typeRanking): static
    {
        $this->typeRanking = $typeRanking;

        return $this;
    }

    #[ORM\OneToMany(targetEntity: Day::class, mappedBy: "championship", cascade: ['persist', 'remove'])]
    private Collection $days;

    #[ORM\ManyToMany(targetEntity: Team::class, mappedBy: "championships")]
    private Collection $teams;
    public function __construct()
    {
        $this->teams = new ArrayCollection();
    }
}
