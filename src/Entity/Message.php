<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessageRepository::class)]
class Message
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date', nullable: true)]
    private $dateMessage;

    #[ORM\Column(type: 'string', length: 8000, nullable: true)]
    private $text;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateMessage(): ?\DateTimeInterface
    {
        return $this->dateMessage;
    }

    public function setDateMessage(?\DateTimeInterface $dateMessage): self
    {
        $this->dateMessage = $dateMessage;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;

        return $this;
    }
}
