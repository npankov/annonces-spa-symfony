<?php

namespace App\Entity;

use App\Repository\DogRepository;
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
}
