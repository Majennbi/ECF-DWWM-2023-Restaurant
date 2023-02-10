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
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BookingController extends AbstractController
{
    #[Route('/booking', name: 'booking.index', methods: ['GET', 'POST'])]
    public function index(BookingRepository $repository, Request $request, EntityManagerInterface $manager)
    : Response
    {   
        
        $errorMessage = null;
        // Retrieve the selected booking hour
       
        /*$startHour = $request->get('startHour');
        $endHour = $request->get('endHour');

        $openingHours = $manager
        ->getRepository(OpeningHours::class)
        ->findOneBy([
            'startHour' => $startHour,
            'endHour' => $endHour
        ]);*/


      
      



    
          // Create a new Booking object
          $booking = new Booking();
          
          //
          //$openingHours->setStartHour(new \DateTimeImmutable());
          //$openingHours->setEndHour(new \DateTimeImmutable());
          //$booking->setBookingHour(new \DateTimeImmutable());

     
          /*$booking->setBookingName($request->get('bookingName', 'No name'));
          $booking->setGuestsNumber($request->get('guestsNumber', 1));
          $bookingHour = \DateTime::createFromFormat('Y-m-d H:i:s', $bookingHour);
          $booking->setBookingHour($bookingHour);*/
    
          $form = $this->createForm(BookingType::class, $booking);
          $form->handleRequest($request);
         // Get the OpeningHours entity that you want to set for every booking
          $openingHours = $manager->getRepository(OpeningHours::class)->findOneBy(['id' => '34']);

        
          if ($form->isSubmitted() && $form->isValid()) {
           
              if ($openingHours) {
            
            // Set the opening_hours_id field of the booking to the ID of the OpeningHours entity
           
                  $booking->setOpeningHours($openingHours);
                  
                  //dd($booking);
                  $entityManager = $manager;
                 
                  $entityManager->persist($booking);
                  $entityManager->flush();
                 
                  $this->addFlash('success', 'Votre réservation a bien été prise en compte!');
                  return $this->redirectToRoute('home.index');
              } else {
                  $errorMessage = "The booking hour you selected is not within the restaurant's opening hours. Please select another";
              }
          }
    
          return $this->render('pages/booking/index.html.twig', [
              'form' => $form->createView(),
              'errorMessage' => $errorMessage
          ]);
    }
    
}