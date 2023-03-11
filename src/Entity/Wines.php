<?php

namespace App\Entity;

use App\Repository\WinesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WinesRepository::class)]
class Wines
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $category = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column]
    private ?int $price14 = null;

    #[ORM\Column]
    private ?int $price75 = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getPrice14(): ?int
    {
        return $this->price14;
    }

    public function setPrice14(int $price14): self
    {
        $this->price14 = $price14;

        return $this;
    }

    public function getPrice75(): ?int
    {
        return $this->price75;
    }

    public function setPrice75(int $price75): self
    {
        $this->price75 = $price75;

        return $this;
    }
}
