<?php

namespace App\Entity;

use App\Repository\AnnouncementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnnouncementRepository::class)]
#[ApiResource(
    collectionOperations: [
        'get' => [
            'normalization' => ['groups' => ['read:Announcement:collection']],
        ],
    ],
    itemOperations: [
        'get' => [
            'normalization_context' => ['groups' => ['read:Announcement:item']],
        ],
    ],
)]
class Announcement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['read:Announcement:item', 'read:Announcement:coll', 'read:Dog:item'])]
    private $id;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    #[Groups(['read:Announcement:item', 'read:Announcement:coll', 'read:Dog:item'])]
    private $title;

    #[ORM\Column(type: 'text', nullable: true)]
    #[Groups(['read:Announcement:item', 'read:Announcement:coll', 'read:Dog:item'])]
    private $infos;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['read:Announcement:item', 'read:Announcement:coll', 'read:Dog:item'])]
    private $link;

    #[ORM\Column(type: 'date', nullable: true)]
    #[Groups(['read:Announcement:item', 'read:Announcement:coll', 'read:Dog:item'])]
    private $dateAnnouncement;

    #[ORM\OneToMany(mappedBy: 'announcement', targetEntity: Message::class)]
    private $messages;

    #[ORM\ManyToOne(targetEntity: Users::class, inversedBy: 'announcements')]
    #[ORM\JoinColumn(nullable: false)]
    private $users;

    #[ORM\ManyToOne(targetEntity: Request::class, inversedBy: 'announcements')]
    private $request;

    #[ORM\OneToMany(targetEntity: Dog::class, mappedBy: 'announcement')]
    #[Groups(['read:Announcement:item'])]
    private $dogs;

    public function __construct()
    {
        $this->messages = new ArrayCollection();
        $this->dogs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getInfos(): ?string
    {
        return $this->infos;
    }

    public function setInfos(?string $infos): self
    {
        $this->infos = $infos;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getDateAnnouncement(): ?\DateTimeInterface
    {
        return $this->dateAnnouncement;
    }

    public function setDateAnnouncement(?\DateTimeInterface $dateAnnouncement): self
    {
        $this->dateAnnouncement = $dateAnnouncement;

        return $this;
    }

    /**
     * @return Collection<int, Message>
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function addMessage(Message $message): self
    {
        if (!$this->messages->contains($message)) {
            $this->messages[] = $message;
            $message->setAnnouncement($this);
        }

        return $this;
    }

    public function removeMessage(Message $message): self
    {
        if ($this->messages->removeElement($message)) {
            // set the owning side to null (unless already changed)
            if ($message->getAnnouncement() === $this) {
                $message->setAnnouncement(null);
            }
        }

        return $this;
    }

    public function getUsers(): ?Users
    {
        return $this->users;
    }

    public function setUsers(?Users $users): self
    {
        $this->users = $users;

        return $this;
    }

    public function getRequest(): ?Request
    {
        return $this->request;
    }

    public function setRequest(?Request $request): self
    {
        $this->request = $request;

        return $this;
    }

    /**
     * @return Collection<int, Dog>
     */
    public function getDogs(): Collection
    {
        return $this->dogs;
    }

    public function addDog(Dog $dog): self
    {
        if (!$this->dogs->contains($dog)) {
            $this->dogs[] = $dog;
            $dog->setAnnouncement($this);
        }

        return $this;
    }

    public function removeDog(Dog $dog): self
    {
        if ($this->dogs->removeElement($dog)) {
            // set the owning side to null (unless already changed)
            if ($dog->getAnnouncement() === $this) {
                $dog->setAnnouncement(null);
            }
        }

        return $this;
    }

    public function getFirstPicture(): ?Picture
    {
        foreach ($this->getDogs() as $dog) {
            foreach ($dog->getPictures() as $picture) {
                return $picture;
            }
        }
        return null;
    }
}
