<?php

namespace App\Entity;

use App\Repository\DogRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DogRepository::class)]
class Dog
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 500, nullable: true)]
    private $background;

    #[ORM\Column(type: 'string', length: 1500, nullable: true)]
    private $description;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $isTolerant;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $isLOF;

    #[ORM\OneToMany(mappedBy: 'dog', targetEntity: Picture::class)]
    private $pictures;

    #[ORM\ManyToMany(targetEntity: Request::class, mappedBy: 'dogs')]
    private $requests;

    public function __construct()
    {
        $this->pictures = new ArrayCollection();
        $this->requests = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBackground(): ?string
    {
        return $this->background;
    }

    public function setBackground(?string $background): self
    {
        $this->background = $background;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getIsTolerant(): ?bool
    {
        return $this->isTolerant;
    }

    public function setIsTolerant(?bool $isTolerant): self
    {
        $this->isTolerant = $isTolerant;

        return $this;
    }

    public function getIsLOF(): ?bool
    {
        return $this->isLOF;
    }

    public function setIsLOF(?bool $isLOF): self
    {
        $this->isLOF = $isLOF;

        return $this;
    }

    /**
     * @return Collection<int, Picture>
     */
    public function getPictures(): Collection
    {
        return $this->pictures;
    }

    public function addPicture(Picture $picture): self
    {
        if (!$this->pictures->contains($picture)) {
            $this->pictures[] = $picture;
            $picture->setDog($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Request>
     */
    public function getRequests(): Collection
    {
        return $this->requests;
    }

    public function addRequest(Request $request): self
    {
        if (!$this->requests->contains($request)) {
            $this->requests[] = $request;
            $request->addDog($this);
        }

        return $this;
    }

    public function removePicture(Picture $picture): self
    {
        if ($this->pictures->removeElement($picture)) {
            // set the owning side to null (unless already changed)
            if ($picture->getDog() === $this) {
                $picture->setDog(null);
            }

            return $this;
        }
    }

    public function removeRequest(Request $request): self
    {
        if ($this->requests->removeElement($request)) {
            $request->removeDog($this);
        }

        return $this;
    }
}
