<?php

namespace App\Entity;

use App\Repository\EvenementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvenementRepository::class)]
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

    #[ORM\Column]
    private ?int $nombre_inscrit = null;

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
}
