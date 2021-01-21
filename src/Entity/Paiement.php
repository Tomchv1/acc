<?php

namespace App\Entity;

use App\Repository\PaiementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaiementRepository::class)
 */
class Paiement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $libelle;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $mensualite;

    /**
     * @ORM\ManyToMany(targetEntity=Adhesion::class, inversedBy="paiements")
     */
    private $adhesion;

    public function __construct()
    {
        $this->adhesion = new ArrayCollection();
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

    public function getMensualite(): ?int
    {
        return $this->mensualite;
    }

    public function setMensualite(?int $mensualite): self
    {
        $this->mensualite = $mensualite;

        return $this;
    }

    /**
     * @return Collection|Adhesion[]
     */

    /**
     * @return Collection|Adhesion[]
     */
    public function getAdhesion(): Collection
    {
        return $this->adhesion;
    }

    public function addAdhesion(Adhesion $adhesion): self
    {
        if (!$this->adhesion->contains($adhesion)) {
            $this->adhesion[] = $adhesion;
        }

        return $this;
    }

    public function removeAdhesion(Adhesion $adhesion): self
    {
        $this->adhesion->removeElement($adhesion);

        return $this;
    }

    public function __toString()
    {
        return sprintf('%s %s', $this->id, $this->libelle);
    }
}
