<?php

namespace App\Entity;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\Recette", inversedBy="categories")
     * @ORM\JoinColumn(nullable=false)
     */
    private $recetteCategories;

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

    public function getRecetteCategories(): ?Recette
    {
        return $this->recetteCategories;
    }

    public function setRecetteCategories(?Recette $recetteCategories): self
    {
        $this->recetteCategories = $recetteCategories;

        return $this;
    }

    public function __toString()
    {
        return $this->typeCategories;

    }
}