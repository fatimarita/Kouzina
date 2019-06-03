<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RecetteRepository")
 * @Vich\Uploadable
 * @method setCommentRecette(Comment $param)
 */
class Recette
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
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbViews;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageSrc;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageAlt;

    /**
     * @Vich\UploadableField(mapping="image_recette", fileNameProperty="imageSrc")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="integer")
     */
    private $liks;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Comment", inversedBy="recette")
     */
    private $CommentRecette;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Categories", mappedBy="recetteCategories")
     */
    private $categories;



    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->updatedAt = new \DateTime();
        $this->CommentRecette= new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getNbViews(): ?int
    {
        return $this->nbViews;
    }

    public function setNbViews(int $nbViews): self
    {
        $this->nbViews = $nbViews;

        return $this;
    }

    public function getImageSrc(): ?string
    {
        return $this->imageSrc;
    }

    public function setImageSrc(?string $imageSrc): self
    {
        $this->imageSrc = $imageSrc;

        return $this;
    }

    public function getImageAlt(): ?string
    {
        return $this->imageAlt;
    }

    public function setImageAlt(?string $imageAlt): self
    {
        $this->imageAlt = $imageAlt;

        return $this;
    }

    public function getLiks(): ?int
    {
        return $this->liks;
    }

    public function setLiks(int $liks): self
    {
        $this->liks = $liks;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(User $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
            $user->setRecette($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->user->contains($user)) {
            $this->user->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getRecette() === $this) {
                $user->setRecette(null);
            }
        }

        return $this;
    }



    /**
     * @return Collection|Comment[]
     */
    public function getCommentRecette(): ?Collection
    {
        return $this->CommentRecette;
    }

    /**
     * @param Comment $CommentRecette
     * @return Recette
     */
    public function addCommentRecette(Comment $CommentRecette): self
    {
        if (!$this->CommentRecette->contains($CommentRecette)) {
            $this->CommentRecette[] = $CommentRecette;
            $CommentRecette->setRecette($this);
        }
        return $this;
    }

    /**
     * @param Comment $CommentRecette
     * @return Recette
     */
    public function removeCommentRecette(Comment $CommentRecette): self
    {
        if ($this->CommentRecette->contains($CommentRecette)) {
            $this->CommentRecette->removeElement($CommentRecette);
            // set the owning side to null (unless already changed)
            if ($CommentRecette->getRecette() === $this) {
                $CommentRecette->setRecette(null);
            }
        }
        return $this;
    }


    /**
     * @return Collection|Categories[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Categories $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->setRecetteCategories($this);
        }

        return $this;
    }

    public function removeCategory(Categories $category): self
    {
        if ($this->categories->contains($category)) {
            $this->categories->removeElement($category);
            // set the owning side to null (unless already changed)
            if ($category->getRecetteCategories() === $this) {
                $category->setRecetteCategories(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->title;

    }
    /**
     * @return File
     */
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }
    /**
     * @param File $imageFile
     */
    public function setImageFile(File $imageFile): void
    {
        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
        $this->imageFile = $imageFile;
    }
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }
    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
