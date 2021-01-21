<?php

namespace App\Entity;

use App\Repository\ActivitesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ActivitesRepository::class)
 */
class Activites
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $libelle;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $age_min;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $age_max;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $tarif_cours;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $tarif_hors_cours;

    /**
     * @ORM\ManyToMany(targetEntity=Adherent::class, inversedBy="activites")
     */
    private $adherent;

    /**
     * @ORM\OneToMany(targetEntity=Horaire::class, mappedBy="activites")
     */
    private $horaires;

    public function __construct()
    {
        $this->adherent = new ArrayCollection();
        $this->horaires = new ArrayCollection();
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

    public function getAgeMin(): ?int
    {
        return $this->age_min;
    }

    public function setAgeMin(?int $age_min): self
    {
        $this->age_min = $age_min;

        return $this;
    }

    public function getAgeMax(): ?int
    {
        return $this->age_max;
    }

    public function setAgeMax(?int $age_max): self
    {
        $this->age_max = $age_max;

        return $this;
    }

    public function getTarifCours(): ?float
    {
        return $this->tarif_cours;
    }

    public function setTarifCours(?float $tarif_cours): self
    {
        $this->tarif_cours = $tarif_cours;

        return $this;
    }

    public function getTarifHorsCours(): ?float
    {
        return $this->tarif_hors_cours;
    }

    public function setTarifHorsCours(?float $tarif_hors_cours): self
    {
        $this->tarif_hors_cours = $tarif_hors_cours;

        return $this;
    }

    /**
     * @return Collection|Adherent[]
     */
    public function getAdherent(): Collection
    {
        return $this->adherent;
    }

    public function addAdherent(Adherent $adherent): self
    {
        if (!$this->adherent->contains($adherent)) {
            $this->adherent[] = $adherent;
        }

        return $this;
    }

    public function removeAdherent(Adherent $adherent): self
    {
        $this->adherent->removeElement($adherent);

        return $this;
    }

    /**
     * @return Collection|Horaire[]
     */
    public function getHoraires(): Collection
    {
        return $this->horaires;
    }

    public function addHoraire(Horaire $horaire): self
    {
        if (!$this->horaires->contains($horaire)) {
            $this->horaires[] = $horaire;
            $horaire->setActivites($this);
        }

        return $this;
    }

    public function removeHoraire(Horaire $horaire): self
    {
        if ($this->horaires->removeElement($horaire)) {
            // set the owning side to null (unless already changed)
            if ($horaire->getActivites() === $this) {
                $horaire->setActivites(null);
            }
        }
        return $this;
    }

    public function __toString()
    {
        return sprintf('%s %s', $this->id, $this->libelle);
    }

}
