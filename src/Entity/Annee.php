<?php

namespace App\Entity;

use App\Repository\AnneeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnneeRepository::class)
 */
class Annee
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity=Adhesion::class, mappedBy="annee")
     */
    private $adhesions;

    public function __construct()
    {
        $this->adhesions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection|Adhesion[]
     */
    public function getAdhesions(): Collection
    {
        return $this->adhesions;
    }

    public function addAdhesion(Adhesion $adhesion): self
    {
        if (!$this->adhesions->contains($adhesion)) {
            $this->adhesions[] = $adhesion;
            $adhesion->setAnnee($this);
        }

        return $this;
    }

    public function removeAdhesion(Adhesion $adhesion): self
    {
        if ($this->adhesions->removeElement($adhesion)) {
            // set the owning side to null (unless already changed)
            if ($adhesion->getAnnee() === $this) {
                $adhesion->setAnnee(null);
            }
        }

        return $this;
    }
}
