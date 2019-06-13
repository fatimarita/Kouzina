<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoriesRepository")
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
    private $typeCategories;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Recette", mappedBy="category")
     */
    private $recettes;

    public function __construct()
    {
        $this->recettes = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeCategories(): ?string
    {
        return $this->typeCategories;
    }

    public function setTypeCategories(string $typeCategories): self
    {
        $this->typeCategories = $typeCategories;

        return $this;
    }



    public function __toString()
    {
        return $this->typeCategories;

    }

    /**
     * @return Collection|Recette[]
     */
    public function getRecettes(): Collection
    {
        return $this->recettes;
    }

    public function addRecette(Recette $recette): self
    {
        if (!$this->recettes->contains($recette)) {
            $this->recettes[] = $recette;
            $recette->setCategory($this);
        }

        return $this;
    }

    public function removeRecette(Recette $recette): self
    {
        if ($this->recettes->contains($recette)) {
            $this->recettes->removeElement($recette);
            // set the owning side to null (unless already changed)
            if ($recette->getCategory() === $this) {
                $recette->setCategory(null);
            }
        }

        return $this;
    }
}