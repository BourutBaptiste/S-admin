<?php

namespace App\Entity;

use App\Repository\StatsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatsRepository::class)]
class Stats
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $ChiffreAffaire = null;

    #[ORM\Column]
    private ?int $MatierePremiere = null;

    #[ORM\Column(nullable: true)]
    private ?int $Benefice = null;

    #[ORM\ManyToOne(inversedBy: 'Stats')]
    private ?Agence $AgenceId = null;



    public function __construct()
    {
        $this->id_Agence = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChiffreAffaire(): ?int
    {
        return $this->ChiffreAffaire;
    }

    public function setChiffreAffaire(?int $ChiffreAffaire): self
    {
        $this->ChiffreAffaire = $ChiffreAffaire;

        return $this;
    }

    public function getMatierePremiere(): ?int
    {
        return $this->MatierePremiere;
    }

    public function setMatierePremiere(int $MatierePremiere): self
    {
        $this->MatierePremiere = $MatierePremiere;

        return $this;
    }

    public function getBenefice(): ?int
    {
        return $this->Benefice;
    }

    public function setBenefice(?int $Benefice): self
    {
        $this->Benefice = $Benefice;

        return $this;
    }

    public function getAgenceId(): ?Agence
    {
        return $this->AgenceId;
    }

    public function setAgenceId(?Agence $AgenceId): self
    {
        $this->AgenceId = $AgenceId;

        return $this;
    }
    /*public function GetNomAgenceId(int $AgenceId){
       $this->AgenceId = $AgenceId;
       return $this->AgenceId->getNom();
    }*/

}
