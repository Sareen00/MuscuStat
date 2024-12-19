<?php

namespace App\Entity;

use App\Repository\ExerciceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExerciceRepository::class)]
class Exercice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(length: 100)]
    private ?string $muscle = null;

    #[ORM\Column(nullable: true)]
    private ?float $charge = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getMuscle(): ?string
    {
        return $this->muscle;
    }

    public function setMuscle(string $muscle): static
    {
        $this->muscle = $muscle;

        return $this;
    }

    public function getCharge(): ?float
    {
        return $this->charge;
    }

    public function setCharge(?float $charge): static
    {
        $this->charge = $charge;

        return $this;
    }
}
