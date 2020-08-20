<?php

namespace App\Entity;

use App\Repository\SejourRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SejourRepository::class)
 */
class Sejour
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
    private $type_logement;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nb_personne;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $titre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="sejour")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity=Activite::class, mappedBy="sejour")
     */
    private $sejour;

    /**
     * @ORM\OneToOne(targetEntity=Destination::class, mappedBy="sejour", cascade={"persist", "remove"})
     */
    private $destination;

    public function __construct()
    {
        $this->sejour = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeLogement(): ?string
    {
        return $this->type_logement;
    }

    public function setTypeLogement(string $type_logement): self
    {
        $this->type_logement = $type_logement;

        return $this;
    }

    public function getNbPersonne(): ?int
    {
        return $this->nb_personne;
    }

    public function setNbPersonne(?int $nb_personne): self
    {
        $this->nb_personne = $nb_personne;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|Activite[]
     */
    public function getSejour(): Collection
    {
        return $this->sejour;
    }

    public function addSejour(Activite $sejour): self
    {
        if (!$this->sejour->contains($sejour)) {
            $this->sejour[] = $sejour;
            $sejour->addSejour($this);
        }

        return $this;
    }

    public function removeSejour(Activite $sejour): self
    {
        if ($this->sejour->contains($sejour)) {
            $this->sejour->removeElement($sejour);
            $sejour->removeSejour($this);
        }

        return $this;
    }

    public function getDestination(): ?Destination
    {
        return $this->destination;
    }

    public function setDestination(Destination $destination): self
    {
        $this->destination = $destination;

        // set the owning side of the relation if necessary
        if ($destination->getSejour() !== $this) {
            $destination->setSejour($this);
        }

        return $this;
    }
}
