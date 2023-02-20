<?php

namespace App\Entity;

use App\Entity\OpeningHours;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\BookingRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints\Custom;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;


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
    #[Assert\GreaterThanOrEqual('today', message: 'Vous devez choisir une date à partir d\'aujourd\'hui ({{ compared_value }}) .')]
    private ?\DateTimeImmutable $bookingDate;
    
    #[ORM\Column(type: Types::TIME_MUTABLE,)]
    private ?\DateTime $bookingHour = null;

    #[ORM\ManyToOne(targetEntity: OpeningHours::class, inversedBy: 'booking', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: true)]
    
    private $openingHours;
  
     public function __construct()
    {
        $this->bookingDate = new \DateTimeImmutable();
        $this->bookingHour = new \DateTime();
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

    public function setBookingDate(\DateTimeImmutable $bookingDate): self
    {
        $this->bookingDate = $bookingDate;
    
        return $this;
    }

    public function getBookingHour(): ?\DateTime
    {
        return $this->bookingHour;
    }

    public function setBookingHour(\DateTime $bookingHour): self
    {
        $this->bookingHour = $bookingHour;

        return $this;
    }
    
    public function getOpeningHours(): ?OpeningHours
    {
        return $this->openingHours;
    }

    public function setOpeningHours(?OpeningHours $openingHours): self
    {
        $this->openingHours = $openingHours;

        return $this;
    }

}
 