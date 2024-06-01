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
    private ?chauffeur $id_utilisateur = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?handicap $id_handicap = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUtilisateur(): ?chauffeur
    {
        return $this->id_utilisateur;
    }

    public function setIdUtilisateur(?chauffeur $id_utilisateur): static
    {
        $this->id_utilisateur = $id_utilisateur;

        return $this;
    }

    public function getIdHandicap(): ?handicap
    {
        return $this->id_handicap;
    }

    public function setIdHandicap(?handicap $id_handicap): static
    {
        $this->id_handicap = $id_handicap;

        return $this;
    }
}
