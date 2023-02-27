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
    private ?int $Price_14_cL = null;

    #[ORM\Column]
    private ?int $Price_75_cL = null;

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

    public function getPrice14CL(): ?int
    {
        return $this->Price_14_cL;
    }

    public function setPrice14CL(int $Price_14_cL): self
    {
        $this->Price_14_cL = $Price_14_cL;

        return $this;
    }

    public function getPrice75CL(): ?int
    {
        return $this->Price_75_cL;
    }

    public function setPrice75CL(int $Price_75_cL): self
    {
        $this->Price_75_cL = $Price_75_cL;

        return $this;
    }
}
