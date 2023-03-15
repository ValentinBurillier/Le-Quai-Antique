<?php

namespace App\Entity;

use App\Repository\ReservationsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationsRepository::class)]
class Reservations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $dateofreservation = null;

    #[ORM\Column(length: 255)]
    private ?string $slotoftheday = null;

    #[ORM\Column]
    private ?int $numberofpersons = null;

    #[ORM\Column(length: 255)]
    private ?string $allergy = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[ORM\Column]
    private ?int $phonenumber = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateofreservation(): ?string
    {
        return $this->dateofreservation;
    }

    public function setDateofreservation(string $dateofreservation): self
    {
        $this->dateofreservation = $dateofreservation;

        return $this;
    }

    public function getSlotoftheday(): ?string
    {
        return $this->slotoftheday;
    }

    public function setSlotoftheday(string $slotoftheday): self
    {
        $this->slotoftheday = $slotoftheday;

        return $this;
    }

    public function getNumberofpersons(): ?int
    {
        return $this->numberofpersons;
    }

    public function setNumberofpersons(int $numberofpersons): self
    {
        $this->numberofpersons = $numberofpersons;

        return $this;
    }

    public function getAllergy(): ?string
    
    {
        return $this->allergy;
    }

    public function setAllergy(string $allergy): self
    {
        $this->allergy = $allergy;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getPhonenumber(): ?int
    {
        return $this->phonenumber;
    }

    public function setPhonenumber(int $phonenumber): self
    {
        $this->phonenumber = $phonenumber;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
}
