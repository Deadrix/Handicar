<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresse = null;

    #[ORM\OneToOne(inversedBy: 'client', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user= null;

    /**
     * @var Collection<int, AvoirHandicap>
     */
    #[ORM\OneToMany(targetEntity: AvoirHandicap::class, mappedBy: 'user', orphanRemoval: true)]
    private Collection $handicaps;

    /**
     * @var Collection<int, Reservation>
     */
    #[ORM\ManyToMany(targetEntity: Reservation::class, mappedBy: 'user')]
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

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
     * @return Collection<int, AvoirHandicap>
     */
    public function getHandicaps(): Collection
    {
        return $this->handicaps;
    }

    public function addHandicap(AvoirHandicap $handicap): static
    {
        if (!$this->handicaps->contains($handicap)) {
            $this->handicaps->add($handicap);
            $handicap->setUser($this);
        }

        return $this;
    }

    public function removeHandicap(AvoirHandicap $handicap): static
    {
        if ($this->handicaps->removeElement($handicap)) {
            // set the owning side to null (unless already changed)
            if ($handicap->getUser() === $this) {
                $handicap->setUser(null);
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
            $reservation->addIdUtilisateur($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): static
    {
        if ($this->reservations->removeElement($reservation)) {
            $reservation->removeIdUtilisateur($this);
        }

        return $this;
    }
}
