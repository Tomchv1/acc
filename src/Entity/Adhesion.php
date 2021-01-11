<?php

namespace App\Entity;

use App\Repository\AdhesionRepository;
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
     * @ORM\Column(type="string", length=11)
     */
    private $annee;

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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnnee(): ?string
    {
        return $this->annee;
    }

    public function setAnnee(string $annee): self
    {
        $this->annee = $annee;

        return $this;
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
}
