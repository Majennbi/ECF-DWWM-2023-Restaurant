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
        
        /*$errorMessage = null;
        // Retrieve the selected booking hour
       
        /*$startHour = $request->get('startHour');
        $endHour = $request->get('endHour');

        $openingHours = $manager
        ->getRepository(OpeningHours::class)
        ->findOneBy([
            'startHour' => $startHour,
            'endHour' => $endHour
        ]);
    
          // Create a new Booking object
          $booking = new Booking();
          
          //
          //$openingHours->setStartHour(new \DateTimeImmutable());
          //$openingHours->setEndHour(new \DateTimeImmutable());
          //$booking->setBookingHour(new \DateTimeImmutable());

     
          /*$booking->setBookingName($request->get('bookingName', 'No name'));
          $booking->setGuestsNumber($request->get('guestsNumber', 1));
          $bookingHour = \DateTime::createFromFormat('Y-m-d H:i:s', $bookingHour);
          $booking->setBookingHour($bookingHour);
    
          $form = $this->createForm(BookingType::class, $booking);
          $startHour = $request->get('startHour');
            $endHour = $request->get('endHour');
          $openingHours = $manager
          ->getRepository(OpeningHours::class)
          ->findOneBy([
              'startHour' => $startHour,
              'endHour' => $endHour
          ]);
          $form->handleRequest($request);
         // Get the OpeningHours entity that you want to set for every booking
          $openingHours = $manager->getRepository(OpeningHours::class)->findOneBy(['id' => '37']);

        
          if ($form->isSubmitted() && $form->isValid()) {
         
             
                $booking = $form->getData();
               
            // Set the opening_hours_id field of the booking to the ID of the OpeningHours entity
           
                  $booking->setOpeningHours($openingHours);
                  
                  
                  $entityManager = $manager;
                 
                  $entityManager->persist($booking);
                  $entityManager->flush();
                  //dd($booking);
                  $this->addFlash('success', 'Votre réservation a bien été prise en compte!');
                  return $this->redirectToRoute('home.index');
              
          }
    
          return $this->render('pages/booking/index.html.twig', [
              'form' => $form->createView(),
              'errorMessage' => $errorMessage
          ]);
    }*/

        
        $booking = new Booking();
        $form = $this->createForm(BookingType::class, $booking);

        $form->handleRequest($request);
         
        $openingHours = $manager->getRepository(OpeningHours::class)->findOneBy(['id' => '39']);
          
        if ($form->isSubmitted() && $form->isValid()) {
            
            $booking = $form->getData();
            $booking->setOpeningHours($openingHours);
            
            $bookingHour = $booking->getBookingHour();
            $openingHours = $booking->getOpeningHours();
            $startHour = $openingHours->getStartHour();
            $endHour = $openingHours->getEndHour();

            if ($bookingHour < $startHour || $bookingHour > $endHour) {
                // Add an error to the form
                $form->addError(new \Symfony\Component\Form\FormError(sprintf('La réservation doit être comprise entre %s et %s', $startHour->format('H\hi'), $endHour->format('H\hi'))));

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
