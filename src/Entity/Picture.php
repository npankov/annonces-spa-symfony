<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PictureRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: PictureRepository::class)]
#[ApiResources(
    collection: [
        'get' => [
            'normalization_context' => ['groups' => ['read:Picture:collection']],
        ],
    ],
    itemOperations: [
        'get' => [
            'normalization_context' => ['groups' => ['read:Picture:item']],
        ],
    ],
)]
class Picture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['read:Race:item', 'read:Dog:item', 'read:Picture:collection', 'read:Picture:item'])]
    private $id;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    #[Groups(['read:Race:item', 'read:Dog:item', 'read:Picture:collection', 'read:Picture:item'])]
    private $title;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['read:Race:item', 'read:Dog:item', 'read:Picture:collection', 'read:Picture:item'])]
    private $description;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['read:Race:item', 'read:Dog:item', 'read:Picture:collection', 'read:Picture:item'])]
    private $link;

    #[ORM\ManyToOne(targetEntity: Dog::class, inversedBy: 'pictures')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['read:Picture:collection', 'read:Picture:item'])]
    private $dog;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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

    public function getDog(): ?Dog
    {
        return $this->dog;
    }

    public function setDog(?Dog $dog): self
    {
        $this->dog = $dog;

        return $this;
    }
}
