<?php

namespace App\Entity;

use App\Repository\FormulasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormulasRepository::class)]
class Formulas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $entreeanddish = null;

    #[ORM\Column]
    private ?int $entreeanddessert = null;

    #[ORM\Column]
    private ?int $dishanddessert = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEntreeanddish(): ?int
    {
        return $this->entreeanddish;
    }

    public function setEntreeanddish(int $entreeanddish): self
    {
        $this->entreeanddish = $entreeanddish;

        return $this;
    }

    public function getEntreeanddessert(): ?int
    {
        return $this->entreeanddessert;
    }

    public function setEntreeanddessert(int $entreeanddessert): self
    {
        $this->entreeanddessert = $entreeanddessert;

        return $this;
    }

    public function getDishanddessert(): ?int
    {
        return $this->dishanddessert;
    }

    public function setDishanddessert(int $dishanddessert): self
    {
        $this->dishanddessert = $dishanddessert;

        return $this;
    }
}
