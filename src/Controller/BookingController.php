<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Form\BookingType;
use App\Entity\OpeningHours;
//use App\Repository\OpeningHoursRepository;
use Doctrine\ORM\Mapping\Id;
use App\Repository\BookingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Validation;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BookingController extends AbstractController
{
    #[Route('/booking', name: 'booking.index', methods: ['GET', 'POST'])]
    public function index(BookingRepository $repository, Request $request, EntityManagerInterface $manager): Response
    {
        $booking = new Booking();
        $form = $this->createForm(BookingType::class, $booking);

        $form->handleRequest($request);

        $openingHours = $manager->getRepository(OpeningHours::class)->findOneBy(['id' => '3']); //Prod :'3']);

        if ($form->isSubmitted() && $form->isValid()) {
            $booking = $form->getData();
            $booking->setOpeningHours($openingHours);

            $bookingHour = $booking->getBookingHour();
            $openingHours = $booking->getOpeningHours();
            $startHour = $openingHours->getStartHour();
            $endHour = $openingHours->getEndHour();

            if ($bookingHour < $startHour || $bookingHour > $endHour) {
                // Add an error to the form
                $form->addError(new \Symfony\Component\Form\FormError(sprintf('La réservation doit 
                être comprise entre %s et %s', $startHour->format('H\hi'), $endHour->format('H\hi'))));

                /*return new JsonResponse([
                    'message' => 'La réservation doit être comprise entre ' . $startHour->format('H\hi') . ' et ' . $endHour->format('H\hi'),
                ], Response::HTTP_BAD_REQUEST);*/ // For AJAX request, feature for later
                
            } else {
                $manager->persist($booking);
                $manager->flush();

                $this->addFlash('success', 'Votre réservation a bien été prise en compte!');

                return $this->redirectToRoute('home.index');
            }
        }
        return $this->render('pages/booking/index.html.twig', [
            'form' => $form->createView(),

        ]);
    }
}
