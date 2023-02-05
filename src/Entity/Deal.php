<?php
//Code for to use later for the deal entity

namespace App\Entity;

use App\Repository\DealRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: DealRepository::class)]
class Deal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\Length(min: 3, max: 50)]
    #[Assert\NotBlank()]
    private ?string $title = null;

    #[ORM\Column]
    #[Assert\Positive()]
    #[Assert\LessThan(value: 1000)]
    #[Assert\NotNull()]
    private ?float $price = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank()]
    private ?string $description = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
