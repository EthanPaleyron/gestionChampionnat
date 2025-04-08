<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: GameRepository::class)]
class Game
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $team1Point = null;

    #[ORM\Column]
    private ?int $team2Point = null;

    #[ORM\Column]
    private ?int $idTeam1 = null;

    #[ORM\Column]
    private ?int $idTeam2 = null;

    #[ORM\Column]
    private ?int $idDay = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTeam1Point(): ?int
    {
        return $this->team1Point;
    }

    public function setTeam1Point(int $team1Point): static
    {
        $this->team1Point = $team1Point;

        return $this;
    }

    public function getTeam2Point(): ?int
    {
        return $this->team2Point;
    }

    public function setTeam2Point(int $team2Point): static
    {
        $this->team2Point = $team2Point;

        return $this;
    }

    public function getIdTeam1(): ?int
    {
        return $this->idTeam1;
    }

    public function setIdTeam1(int $idTeam1): static
    {
        $this->idTeam1 = $idTeam1;

        return $this;
    }

    public function getIdTeam2(): ?int
    {
        return $this->idTeam2;
    }

    public function setIdTeam2(int $idTeam2): static
    {
        $this->idTeam2 = $idTeam2;

        return $this;
    }

    public function getIdDay(): ?int
    {
        return $this->idDay;
    }

    public function setIdDay(int $idDay): static
    {
        $this->idDay = $idDay;

        return $this;
    }

    #[ORM\ManyToOne(targetEntity: Team::class, inversedBy: "games1")]
    #[ORM\JoinColumn(name: "id_team1", referencedColumnName: "id")]
    private Team $team1;

    #[ORM\ManyToOne(targetEntity: Team::class, inversedBy: "games2")]
    #[ORM\JoinColumn(name: "id_team2", referencedColumnName: "id")]
    private Team $team2;

    #[ORM\ManyToOne(targetEntity: Day::class, inversedBy: "games")]
    #[ORM\JoinColumn(name: "id_day", referencedColumnName: "id")]
    private Day $day;

}
