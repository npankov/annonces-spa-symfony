<?php

namespace App\Entity;

use App\Repository\BreederRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BreederRepository::class)]
class Breeder extends Users
{
    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $name;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = parent::getRoles();
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_BREEDER';

        return array_unique($roles);
    }

    public function __toString()
    {
        return $this->getName();
    }
}
