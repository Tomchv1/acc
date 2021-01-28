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
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $banque;

    /**
     * @ORM\OneToOne(targetEntity=Adherent::class, mappedBy="adhesion", cascade={"persist", "remove"})
     */
    private $adherent;

    /**
     * @ORM\ManyToOne(targetEntity=Annee::class, inversedBy="adhesions")
     */
    private $annee;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $montant_total;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $montant_cb;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $montant_sepa;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $montant_ancv;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $montant_can;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $montant_cheque;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $montant_autre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $commentaire;


    public function getBanque(): ?string
    {
        return $this->banque;
    }

    public function setBanque(?string $banque): self
    {
        $this->banque = $banque;

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

    public function getMontantTotal(): ?float
    {
        return $this->montant_total;
    }

    public function setMontantTotal(?float $montant_total): self
    {
        $this->montant_total = $montant_total;

        return $this;
    }

    public function getMontantCb(): ?float
    {
        return $this->montant_cb;
    }

    public function setMontantCb(?float $montant_cb): self
    {
        $this->montant_cb = $montant_cb;

        return $this;
    }

    public function getMontantSepa(): ?float
    {
        return $this->montant_sepa;
    }

    public function setMontantSepa(?float $montant_sepa): self
    {
        $this->montant_sepa = $montant_sepa;

        return $this;
    }

    public function getMontantAncv(): ?float
    {
        return $this->montant_ancv;
    }

    public function setMontantAncv(?float $montant_ancv): self
    {
        $this->montant_ancv = $montant_ancv;

        return $this;
    }

    public function getMontantCan(): ?float
    {
        return $this->montant_can;
    }

    public function setMontantCan(?float $montant_can): self
    {
        $this->montant_can = $montant_can;

        return $this;
    }

    public function getMontantCheque(): ?float
    {
        return $this->montant_cheque;
    }

    public function setMontantCheque(?float $montant_cheque): self
    {
        $this->montant_cheque = $montant_cheque;

        return $this;
    }

    public function getMontantAutre(): ?float
    {
        return $this->montant_autre;
    }

    public function setMontantAutre(?float $montant_autre): self
    {
        $this->montant_autre = $montant_autre;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }
}
