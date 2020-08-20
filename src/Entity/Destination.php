<?php

namespace App\Entity;

use App\Repository\DestinationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DestinationRepository::class)
 */
class Destination
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lieu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pays;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_ouverture;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nb_star;

    /**
     * @ORM\OneToOne(targetEntity=sejour::class, inversedBy="destination", cascade={ "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $sejour;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(?string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(?string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getDateOuverture(): ?\DateTimeInterface
    {
        return $this->date_ouverture;
    }

    public function setDateOuverture(?\DateTimeInterface $date_ouverture): self
    {
        $this->date_ouverture = $date_ouverture;

        return $this;
    }

    public function getNbStar(): ?int
    {
        return $this->nb_star;
    }

    public function setNbStar(?int $nb_star): self
    {
        $this->nb_star = $nb_star;

        return $this;
    }

    public function getSejour(): ?sejour
    {
        return $this->sejour;
    }

    public function setSejour(sejour $sejour): self
    {
        $this->sejour = $sejour;

        return $this;
    }
}
