<?php

namespace App\Entity;

use App\Repository\AdhesionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdhesionRepository::class)
 */
class Adhesion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $montant_a_regler;

    /**
     * @ORM\Column(type="float")
     */
    private $montant_regle;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $banque;

    /**
     * @ORM\ManyToMany(targetEntity=Paiement::class, mappedBy="adhesion")
     */
    private $paiements;

    /**
     * @ORM\OneToOne(targetEntity=Adherent::class, mappedBy="adhesion", cascade={"persist", "remove"})
     */
    private $adherent;

    /**
     * @ORM\ManyToOne(targetEntity=Annee::class, inversedBy="adhesions")
     */
    private $annee;

    public function __construct()
    {
        $this->paiements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontantARegler(): ?float
    {
        return $this->montant_a_regler;
    }

    public function setMontantARegler(float $montant_a_regler): self
    {
        $this->montant_a_regler = $montant_a_regler;

        return $this;
    }

    public function getMontantRegle(): ?float
    {
        return $this->montant_regle;
    }

    public function setMontantRegle(float $montant_regle): self
    {
        $this->montant_regle = $montant_regle;

        return $this;
    }

    public function getBanque(): ?string
    {
        return $this->banque;
    }

    public function setBanque(?string $banque): self
    {
        $this->banque = $banque;

        return $this;
    }

    /**
     * @return Collection|Paiement[]
     */
    public function getPaiements(): Collection
    {
        return $this->paiements;
    }

    public function addPaiement(Paiement $paiement): self
    {
        if (!$this->paiements->contains($paiement)) {
            $this->paiements[] = $paiement;
            $paiement->addAdhesion($this);
        }

        return $this;
    }

    public function removePaiement(Paiement $paiement): self
    {
        if ($this->paiements->removeElement($paiement)) {
            $paiement->removeAdhesion($this);
        }

        return $this;
    }

    public function getAdherent(): ?Adherent
    {
        return $this->adherent;
    }

    public function setAdherent(?Adherent $adherent): self
    {
        // unset the owning side of the relation if necessary
        if ($adherent === null && $this->adherent !== null) {
            $this->adherent->setAdhesion(null);
        }

        // set the owning side of the relation if necessary
        if ($adherent !== null && $adherent->getAdhesion() !== $this) {
            $adherent->setAdhesion($this);
        }

        $this->adherent = $adherent;

        return $this;
    }

    public function getAnnee(): ?Annee
    {
        return $this->annee;
    }

    public function setAnnee(?Annee $annee): self
    {
        $this->annee = $annee;

        return $this;
    }
}
