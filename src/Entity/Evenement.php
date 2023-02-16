<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Repository\EvenementRepository;
use Doctrine\DBAL\Types\Types;
use ApiPlatform\Metadata\Delete;
use Doctrine\ORM\Mapping as ORM;
use App\Controller\InscriptionController;

#[ORM\Entity(repositoryClass: EvenementRepository::class)]
#[ApiResource]
class Evenement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_de_debut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_de_fin = null;

    #[ORM\Column]
    private ?int $nombre_participant_max = null;

    #[ORM\Column(options:['default'=>0])]
    private ?int $nombre_inscrit = 0;

    #[ORM\Column(type:"datetime_immutable", options:['default'=>'CURRENT_TIMESTAMP'])]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(length: 150)]
    private ?string $nom_evenement = null;

    #[ORM\OneToMany(mappedBy: 'evenement', targetEntity: Inscription::class)]
    private Collection $inscriptions;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->nombre_inscrit = 0;
        $this->inscriptions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDeDebut(): ?\DateTimeInterface
    {
        return $this->date_de_debut;
    }

    public function setDateDeDebut(\DateTimeInterface $date_de_debut): self
    {
        $this->date_de_debut = $date_de_debut;

        return $this;
    }

    public function getDateDeFin(): ?\DateTimeInterface
    {
        return $this->date_de_fin;
    }

    public function setDateDeFin(\DateTimeInterface $date_de_fin): self
    {
        $this->date_de_fin = $date_de_fin;

        return $this;
    }

    public function getNombreParticipantMax(): ?int
    {
        return $this->nombre_participant_max;
    }

    public function setNombreParticipantMax(int $nombre_participant_max): self
    {
        $this->nombre_participant_max = $nombre_participant_max;

        return $this;
    }

    public function getNombreInscrit(): ?int
    {
        return $this->nombre_inscrit;
    }

    public function setNombreInscrit(int $nombre_inscrit): self
    {
        $this->nombre_inscrit = $nombre_inscrit;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getNomEvenement(): ?string
    {
        return $this->nom_evenement;
    }

    public function setNomEvenement(string $nom_evenement): self
    {
        $this->nom_evenement = $nom_evenement;

        return $this;
    }

    /**
     * @return Collection<int, Inscription>
     */
    public function getInscriptions(): Collection
    {
        return $this->inscriptions;
    }

    public function addInscription(Inscription $inscription): self
    {
        if (!$this->inscriptions->contains($inscription)) {
            $this->inscriptions->add($inscription);
            $inscription->setEvenement($this);
        }

        return $this;
    }

    public function removeInscription(Inscription $inscription): self
    {
        if ($this->inscriptions->removeElement($inscription)) {
            // set the owning side to null (unless already changed)
            if ($inscription->getEvenement() === $this) {
                $inscription->setEvenement(null);
            }
        }

        return $this;
    }

}
