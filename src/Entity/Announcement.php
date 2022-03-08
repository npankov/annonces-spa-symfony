<?php

namespace App\Entity;

use App\Repository\AnnouncementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnnouncementRepository::class)]
class Announcement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $title;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $infos;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $link;

    #[ORM\Column(type: 'date', nullable: true)]
    private $dateAnnouncement;

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
}
