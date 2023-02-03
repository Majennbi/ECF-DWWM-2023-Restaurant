<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\BookingRepository;
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: BookingRepository::class)]
class Booking
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 1, max: 6)]
    private ?int $guestsNumber = null;

    #[ORM\Column(type: 'date_immutable')]
    #[Assert\NotNull()]
    private ?\DateTimeImmutable $bookingDate;

    #[ORM\Column(type: 'time_immutable')]
    #[Assert\NotNull()]
    private ?\DateTimeImmutable $bookingHour;

    /*#[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $availableSeats;*/

     public function __construct()
    {
        $this->bookingDate = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
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
    

    public function getBookingHour(): ?\DateTimeImmutable
    {
        return $this->bookingHour;
    }

    public function setBookingHour(?\DateTimeImmutable $bookingHour): self
    {
        $this->bookingHour = $bookingHour;

        return $this;
    }

    /*public function getAvailableSeats(): ?bool
    {
        return $this->availableSeats;
    }

    public function setAvailableSeats(?bool $availableSeats): self
    {
        $this->availableSeats = $availableSeats;

        return $this;
    }*/
}
