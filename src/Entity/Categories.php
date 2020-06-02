<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoriesRepository::class)
 */
class Categories
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_categorie;

    /**
     * @ORM\ManyToMany(targetEntity=Outils::class, inversedBy="categories")
     */
    private $outils;

    public function __construct()
    {
        $this->outils = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCategorie(): ?string
    {
        return $this->nom_categorie;
    }

    public function setNomCategorie(string $nom_categorie): self
    {
        $this->nom_categorie = $nom_categorie;

        return $this;
    }

    /**
     * @return Collection|Outils[]
     */
    public function getOutils(): Collection
    {
        return $this->outils;
    }

    public function addOutil(Outils $outil): self
    {
        if (!$this->outils->contains($outil)) {
            $this->outils[] = $outil;
        }

        return $this;
    }

    public function removeOutil(Outils $outil): self
    {
        if ($this->outils->contains($outil)) {
            $this->outils->removeElement($outil);
        }

        return $this;
    }
}
