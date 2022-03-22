<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\RaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: RaceRepository::class)]
#[ApiResource(
    collectionOperations: [
        'get' => [
            'normalization_context' => ['groups' => ['read:Race:collection']],
        ],
    ],
    itemOperations: [
        'get' => [
            'normalization_context' => ['groups' => ['read:Race:item']],
        ],
    ],
)]
class Race
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['read:Race:collection', 'read:Race:item', 'read:Dog:item'])]
    private $id;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    #[Groups(['read:Race:collection', 'read:Race:item', 'read:Dog:item'])]
    private $name;

    #[ORM\ManyToMany(targetEntity: Dog::class, mappedBy: 'race')]
    #[Groups(['read:Race:item'])]
    private $dogs;

    public function __construct()
    {
        $this->dogs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

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
            $dog->addRace($this);
        }

        return $this;
    }

    public function removeDog(Dog $dog): self
    {
        if ($this->dogs->removeElement($dog)) {
            $dog->removeRace($this);
        }

        return $this;
    }
}
