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

    #[ORM\ManyToMany(targetEntity: Race::class, inversedBy: 'dogs')]
    private $race;

    #[ORM\ManyToMany(targetEntity: Request::class, mappedBy: 'dogs')]
    private $requests;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\ManyToOne(targetEntity: Announcement::class, inversedBy: 'dogs', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $announcement;

    public function __construct()
    {
        $this->pictures = new ArrayCollection();
        $this->race = new ArrayCollection();
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

    /**
     * @return Collection<int, Race>
     */
    public function getRace(): Collection
    {
        return $this->race;
    }

    public function addRace(Race $race): self
    {
        if (!$this->race->contains($race)) {
            $this->race[] = $race;
        }

        return $this;
    }

    public function removeRace(Race $race): self
    {
        $this->race->removeElement($race);

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAnnouncement(): ?Announcement
    {
        return $this->announcement;
    }

    public function setAnnouncement(?Announcement $announcement): self
    {
        $this->announcement = $announcement;

        return $this;
    }
}
