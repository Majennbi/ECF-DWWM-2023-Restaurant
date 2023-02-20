<?php

namespace App\Entity;

use App\Entity\Booking;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\OpeningHoursRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;


#[ORM\Entity(repositoryClass: OpeningHoursRepository::class)]
class OpeningHours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $startHour = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $endHour = null;

    #[ORM\OneToMany(mappedBy: 'openingHours', targetEntity: Booking::class)]
    private $booking;

    public function __construct()
    {

        $this->booking = new ArrayCollection();
        $this->startHour = new \DateTime();
        $this->endHour = new \DateTime();
      
    }
   
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartHour(): ?\DateTime
    {
        return $this->startHour;
    }

    public function setStartHour(\DateTime $startHour): self
    {
        $this->startHour = $startHour;

        return $this;
    }

    public function getEndHour(): ?\DateTime
    {
        return $this->endHour;
    }

    public function setEndHour(\DateTime $endHour): self
    {
        $this->endHour = $endHour;

        return $this;
    }

     /**
     * @return Collection|Booking[]
     */

    public function getBooking(): Collection
    {
        return $this->booking;
    }

    public function addBooking(Booking $booking): self
    {
        if (!$this->booking->contains($booking)) {
            $this->booking[] = $booking;
            $booking->setOpeningHours($this);
        }

        return $this;
    }

    public function removeBooking(Booking $booking): self
    {
        if ($this->booking->removeElement($booking)) {
            // set the owning side to null (unless already changed)
            if ($booking->getOpeningHours() === $this) {
                $booking->setOpeningHours(null);
            }
        }

        return $this;
    } 
}
