<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $heure_depart = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $heure_arrivee = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\JoinColumn(nullable: false)]
    private ?mission $id_mission = null;

    /**
     * @var Collection<int, client>
     */
    #[ORM\ManyToMany(targetEntity: client::class, inversedBy: 'reservations')]
    private Collection $id_utilisateur;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?chauffeur $id_chauffeur = null;

    public function __construct()
    {
        $this->id_utilisateur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeureDepart(): ?\DateTimeInterface
    {
        return $this->heure_depart;
    }

    public function setHeureDepart(\DateTimeInterface $heure_depart): static
    {
        $this->heure_depart = $heure_depart;

        return $this;
    }

    public function getHeureArrivee(): ?\DateTimeInterface
    {
        return $this->heure_arrivee;
    }

    public function setHeureArrivee(\DateTimeInterface $heure_arrivee): static
    {
        $this->heure_arrivee = $heure_arrivee;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getIdMission(): ?mission
    {
        return $this->id_mission;
    }

    public function setIdMission(mission $id_mission): static
    {
        $this->id_mission = $id_mission;

        return $this;
    }

    /**
     * @return Collection<int, client>
     */
    public function getIdUtilisateur(): Collection
    {
        return $this->id_utilisateur;
    }

    public function addIdUtilisateur(client $idUtilisateur): static
    {
        if (!$this->id_utilisateur->contains($idUtilisateur)) {
            $this->id_utilisateur->add($idUtilisateur);
        }

        return $this;
    }

    public function removeIdUtilisateur(client $idUtilisateur): static
    {
        $this->id_utilisateur->removeElement($idUtilisateur);

        return $this;
    }

    public function getIdChauffeur(): ?chauffeur
    {
        return $this->id_chauffeur;
    }

    public function setIdChauffeur(?chauffeur $id_chauffeur): static
    {
        $this->id_chauffeur = $id_chauffeur;

        return $this;
    }
}
