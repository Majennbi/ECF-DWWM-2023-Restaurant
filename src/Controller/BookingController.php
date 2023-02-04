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
        
        $booking = new Booking();
        $form = $this->createForm(BookingType::class, $booking);

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $booking = $form->getData();
    
            $manager->persist($booking);
            $manager->flush();

            $this->addFlash('success', 'Votre réservation a bien été prise en compte!');

            return $this->redirectToRoute('home.index');
        }
        
        return $this->render('pages/booking/index.html.twig', [
            'form' => $form->createView(),
        ]);

    }
}
