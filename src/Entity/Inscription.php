<?php

namespace App\Entity;

use App\Repository\InscriptionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InscriptionRepository::class)
 */
class Inscription
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $traite_par;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=6)
     */
    private $assurance;

    /**
     * @ORM\Column(type="string", length=6)
     */
    private $statut_ri;

    /**
     * @ORM\OneToOne(targetEntity=Adherent::class, mappedBy="inscription", cascade={"persist", "remove"})
     */
    private $adherent;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTraitePar(): ?string
    {
        return $this->traite_par;
    }

    public function setTraitePar(?string $traite_par): self
    {
        $this->traite_par = $traite_par;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(?string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getAssurance(): ?string
    {
        return $this->assurance;
    }

    public function setAssurance(string $assurance): self
    {
        $this->assurance = $assurance;

        return $this;
    }

    public function getStatutRi(): ?string
    {
        return $this->statut_ri;
    }

    public function setStatutRi(string $statut_ri): self
    {
        $this->statut_ri = $statut_ri;

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
            $this->adherent->setInscription(null);
        }

        // set the owning side of the relation if necessary
        if ($adherent !== null && $adherent->getInscription() !== $this) {
            $adherent->setInscription($this);
        }

        $this->adherent = $adherent;

        return $this;
    }
}
