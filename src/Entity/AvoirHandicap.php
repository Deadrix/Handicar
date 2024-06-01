<?php

namespace App\Entity;

use App\Repository\AvoirHandicapRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvoirHandicapRepository::class)]
class AvoirHandicap
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'handicaps')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Client $user = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Handicap $handicap = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?Client
    {
        return $this->user;
    }

    public function setUser(?Client $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getHandicap(): ?handicap
    {
        return $this->handicap;
    }

    public function setIdHandicap(?handicap $handicap): static
    {
        $this->handicap = $handicap;

        return $this;
    }
}
