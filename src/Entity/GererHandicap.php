<?php

namespace App\Entity;

use App\Repository\GererHandicapRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GererHandicapRepository::class)]
class GererHandicap
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'handicaps')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Chauffeur $user = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Handicap $handicap = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?Chauffeur
    {
        return $this->user;
    }

    public function setUser(?chauffeur $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getHandicap(): ?handicap
    {
        return $this->handicap;
    }

    public function setHandicap(?handicap $handicap): static
    {
        $this->handicap = $handicap;

        return $this;
    }
}
