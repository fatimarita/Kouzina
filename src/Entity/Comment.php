<?php
namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**


 *
 * @ORM\Entity(repositoryClass="App\Repository\CommentRepository")
 * @method setRecette(Recette $recette)
 * @method setCommentRecette($comment)
 */
class Comment
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $content;
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;
    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $stars;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Recette", mappedBy="CommentRecette")
     */
    private $recette;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="commentUser")
     */
    private $user;
    public function __construct()
    {
        $this->recette = new ArrayCollection();
        $this->user = new ArrayCollection();
    }
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getContent(): ?string
    {
        return $this->content;
    }
    public function setContent(?string $content): self
    {
        $this->content = $content;
        return $this;
    }
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }
    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }
    public function getStars(): ?int
    {
        return $this->stars;
    }
    public function setStars(?int $stars): self
    {
        $this->stars = $stars;
        return $this;
    }
    /**
     * @return Collection|Recette[]
     */
    public function getRecette(): Collection
    {
        return $this->recette;
    }

    /**
     * @param Recette $recette
     * @return Comment
     */
    public function addRecette(Recette $recette): self
    {
        if (!$this->recette->contains($recette)) {
            $this->recette[] = $recette;
            $recette->addCommentRecette($this);
        }
        return $this;
    }
    public function removeRecette(Recette $recette): self
    {
        if ($this->recette->contains($recette)) {
            $this->recette->removeElement($recette);
            // set the owning side to null (unless already changed)
            if ($recette->getCommentRecette() === $this) {
                $recette->setCommentRecette(null);
            }
        }
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
            $user->setCommentUser($this);
        }
        return $this;
    }
    public function removeUser(User $user): self
    {
        if ($this->user->contains($user)) {
            $this->user->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getCommentUser() === $this) {
                $user->setCommentUser(null);
            }
        }
        return $this;
    }
}