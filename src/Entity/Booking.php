<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\BookingRepository;
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: BookingRepository::class)]
class Booking
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    
    #[ORM\Column(length: 50)]
    #[Assert\Length(min: 3, max: 50)]
    private ?string $bookingName = null;

    #[ORM\Column]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 1, max: 6)]
    private ?int $guestsNumber = null;

    #[ORM\Column(type: 'date_immutable')]
    #[Assert\NotNull()]
    private ?\DateTimeImmutable $bookingDate;

    #[ORM\Column(type: 'string')]
    #[Assert\NotNull()]
    private ?string $bookingHour;

     public function __construct()
    {
        $this->bookingDate = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBookingName(): ?string
    {
        return $this->bookingName;
    }

    public function setBookingName(string $bookingName): self
    {
        $this->bookingName = $bookingName;

        return $this;
    }

    public function getGuestsNumber(): ?int
    {
        return $this->guestsNumber;
    }

    public function setGuestsNumber(int $guestsNumber): self
    {
        $this->guestsNumber = $guestsNumber;

        return $this;
    }

    public function getBookingDate(): ?\DateTimeImmutable
    {
        return $this->bookingDate;
    }

    public function setBookingDate(\DateTime $bookingDate): self
    {
        $this->bookingDate = new \DateTimeImmutable($bookingDate->format('Y-m-d H:i:s'));
    
        return $this;
    }
    

    public function getBookingHour(): ?string
    {
        return $this->bookingHour;
    }

    public function setBookingHour(?string $bookingHour): self
    {
        $this->bookingHour = $bookingHour;

        return $this;
    }
}
