<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\OpeningHoursRepository;


#[ORM\Entity(repositoryClass: OpeningHoursRepository::class)]
class OpeningHours
{
    #[ORM\Id]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?\DateTimeImmutable $startHour = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?\DateTimeImmutable $endHour = null;

    #[ORM\OneToMany(mappedBy: 'openingHours', targetEntity: Booking::class)]
    private $booking;

    public function __construct()
    {

        $this->booking = new ArrayCollection();
        $this->startHour = new \DateTimeImmutable();
        $this->endHour = new \DateTimeImmutable();
      
    }
   
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartHour(): ?\DateTimeImmutable
    {
        return $this->startHour;
    }

    public function setStartHour(\DateTimeImmutable $startHour): self
    {
        $this->startHour = $startHour;

        return $this;
    }

    public function getEndHour(): ?\DateTimeImmutable
    {
        return $this->endHour;
    }

    public function setEndHour(\DateTimeImmutable $endHour): self
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
