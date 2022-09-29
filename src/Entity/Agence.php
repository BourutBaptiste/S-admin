<?php

namespace App\Entity;

use App\Repository\AgenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AgenceRepository::class)]
class Agence
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255)]
    private ?string $NomRue = null;

    #[ORM\Column]
    private ?int $NumRue = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Ville = null;

    #[ORM\OneToMany(mappedBy: 'AgenceId', targetEntity: Stats::class)]
    private Collection $Stats;

    public function __construct()
    {
        $this->Stats = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getNomRue(): ?string
    {
        return $this->NomRue;
    }

    public function setNomRue(string $NomRue): self
    {
        $this->NomRue = $NomRue;

        return $this;
    }

    public function getNumRue(): ?int
    {
        return $this->NumRue;
    }

    public function setNumRue(int $NumRue): self
    {
        $this->NumRue = $NumRue;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->Ville;
    }

    public function setVille(?string $Ville): self
    {
        $this->Ville = $Ville;

        return $this;
    }

    /**
     * @return Collection<int, Stats>
     */
    public function getStats(): Collection
    {
        return $this->Stats;
    }

    public function addStat(Stats $stat): self
    {
        if (!$this->Stats->contains($stat)) {
            $this->Stats->add($stat);
            $stat->setAgenceId($this);
        }

        return $this;
    }

    public function removeStat(Stats $stat): self
    {
        if ($this->Stats->removeElement($stat)) {
            // set the owning side to null (unless already changed)
            if ($stat->getAgenceId() === $this) {
                $stat->setAgenceId(null);
            }
        }

        return $this;
    }

}
