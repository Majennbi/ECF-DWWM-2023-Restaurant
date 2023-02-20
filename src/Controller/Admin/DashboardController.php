<?php

namespace App\Controller\Admin;

use App\Entity\Dish;
use App\Entity\User;
use App\Entity\Booking;
use App\Entity\OpeningHours;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    #[IsGranted('ROLE_ADMIN')]
    public function index(): Response
    {
         return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Le Quai Antique - Administration')
            ->renderContentMaximized();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToUrl('Retour vers le site', 'fas fa-circle-left' ,'/');
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-users', User::class);
        yield MenuItem::linkToCrud('Plats de la carte', 'fas fa-utensils', Dish::class);
        yield MenuItem::linkToCrud('Réservations', 'fas fa-calendar-check', Booking::class);
        yield MenuItem::linkToCrud("Horaires d'ouvertures", 'fas fa-clock', OpeningHours::class);
        
    }
}
