<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Form\BookingType;
use App\Repository\BookingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BookingController extends AbstractController
{
    #[Route('/booking', name: 'booking.index', methods: ['GET', 'POST'])]
    public function index(BookingRepository $repository, Request $request, EntityManagerInterface $manager)
    : Response
    {
        
        //$timeSlots = ['12:00', '12:15', '12:30', '12:45', '13:00', '13:15', '13:30', '13:45', '14:00'];
        $booking = new Booking();
        $form = $this->createForm(BookingType::class, $booking);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $selectedTimeSlot = $form->getData()->getTimeSlot();
    
            # Update the database to mark the selected time slot as booked
    
            $manager->persist($booking);
            $manager->flush();

            $this->addFlash('success', 'Votre réservation a bien été prise en compte!');

            return $this->redirectToRoute('home.index');
        }

        return $this->render('pages/booking/index.html.twig', [
            'form' => $form->createView(),
            'timeSlots' => $this->getTimeSlots(),
        ]);

    }
        public static function getTimeSlots(): array
    {
        $timeSlots = [];
        for ($i = 9; $i <= 17; $i++) {
            $timeSlots[] = \DateTimeImmutable::createFromFormat('H:i', "$i:00");
        }
        return $timeSlots;
    }

   
}
