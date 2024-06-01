<?php

namespace App\Entity;

use App\Repository\ChauffeurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChauffeurRepository::class)]
class Chauffeur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $carte_grise = null;

    #[ORM\Column(length: 255)]
    private ?string $permis_de_conduire = null;

    #[ORM\OneToOne(inversedBy: 'chauffeur', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    /**
     * @var Collection<int, GererHandicap>
     */
    #[ORM\OneToMany(targetEntity: GererHandicap::class, mappedBy: 'user', orphanRemoval: true)]
    private Collection $handicaps;

    /**
     * @var Collection<int, Reservation>
     */
    #[ORM\OneToMany(targetEntity: Reservation::class, mappedBy: 'id_chauffeur')]
    private Collection $reservations;

    public function __construct()
    {
        $this->handicaps = new ArrayCollection();
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCarteGrise(): ?string
    {
        return $this->carte_grise;
    }

    public function setCarteGrise(string $carte_grise): static
    {
        $this->carte_grise = $carte_grise;

        return $this;
    }

    public function getPermisDeConduire(): ?string
    {
        return $this->permis_de_conduire;
    }

    public function setPermisDeConduire(string $permis_de_conduire): static
    {
        $this->permis_de_conduire = $permis_de_conduire;

        return $this;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(user $user): static
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, GererHandicap>
     */
    public function getHandicaps(): Collection
    {
        return $this->handicaps;
    }

    public function addHandicap(GererHandicap $handicap): static
    {
        if (!$this->handicaps->contains($handicap)) {
            $this->handicaps->add($handicap);
            $handicap->setIdUtilisateur($this);
        }

        return $this;
    }

    public function removeHandicap(GererHandicap $handicap): static
    {
        if ($this->handicaps->removeElement($handicap)) {
            // set the owning side to null (unless already changed)
            if ($handicap->getIdUtilisateur() === $this) {
                $handicap->setIdUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): static
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations->add($reservation);
            $reservation->setIdChauffeur($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): static
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getIdChauffeur() === $this) {
                $reservation->setIdChauffeur(null);
            }
        }

        return $this;
    }
}
