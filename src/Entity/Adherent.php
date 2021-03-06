<?php

namespace App\Entity;

use App\Repository\AdherentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdherentRepository::class)
 */
class Adherent 
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $genre;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $date_naissance;

    /**
     * @ORM\ManyToOne(targetEntity=Famille::class, inversedBy="adherents")
     */
    private $famille;

    /**
     * @ORM\ManyToMany(targetEntity=Responsable::class, mappedBy="adherent")
     */
    private $responsables;

    /**
     * @ORM\ManyToMany(targetEntity=Activites::class, mappedBy="adherent")
     */
    private $activites;

    /**
     * @ORM\OneToOne(targetEntity=Adhesion::class, inversedBy="adherent", cascade={"persist", "remove"})
     */
    private $adhesion;

    public function __construct()
    {
        $this->responsables = new ArrayCollection();
        $this->activites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(?string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaissance(): ?string
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(string $date_naissance): self
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getFamille(): ?Famille
    {
        return $this->famille;
    }

    public function setFamille(?Famille $famille): self
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * @return Collection|Responsable[]
     */
    public function getResponsables(): Collection
    {
        return $this->responsables;
    }

    public function addResponsable(Responsable $responsable): self
    {
        if (!$this->responsables->contains($responsable)) {
            $this->responsables[] = $responsable;
            $responsable->addAdherent($this);
        }

        return $this;
    }

    public function removeResponsable(Responsable $responsable): self
    {
        if ($this->responsables->contains($responsable)) {
        $this->responsables->removeElement($responsable);
        // set the owning side to null (unless already changed)
            if ($responsable->getAdherent() === $this) {
                $thing->setAdherent(null);
            }
        }

        // if ($this->responsables->removeElement($responsable)) {
        //     $responsable->removeAdherent($this);
        // }

        return $this;
    }

    /**
     * @return Collection|Activites[]
     */
    public function getActivites(): Collection
    {
        return $this->activites;
    }

    public function addActivite(Activites $activite): self
    {
        if (!$this->activites->contains($activite)) {
            $this->activites[] = $activite;
            $activite->addAdherent($this);
        }

        return $this;
    }

    public function removeActivite(Activites $activite): self
    {
        if ($this->activites->removeElement($activite)) {
            $activite->removeAdherent($this);
        }

        return $this;
    }

    public function getAdhesion(): ?Adhesion
    {
        return $this->adhesion;
    }

    public function setAdhesion(?Adhesion $adhesion): self
    {
        $this->adhesion = $adhesion;

        return $this;
    }
}
