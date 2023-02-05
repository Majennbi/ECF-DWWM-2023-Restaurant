<?php

namespace App\Controller;

use App\Entity\Dish;
use App\Form\DishType;
use Doctrine\ORM\EntityManager;
use App\Repository\DishRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class DishController extends AbstractController
{
    /**
     * @param DishRepository $repository
     * @return Response
     */
    
    #[Route('/dish', name: 'dish.index', methods: ['GET'])]
    public function index(DishRepository $repository, Request $request): Response
    {  
        /*$cache = new FilesystemAdapter();
        $data = $cache->get('dishes', function( ItemInterface $item) use ($repository) {
            $item->expiresAfter(15);
            return $repository->findAll(null);
        });*/ //cache not working like that, check later

        return $this->render('pages/dish/index.html.twig', [
            'dishes' => $repository->findAll() //[] *Test message si données non récupérées*
            
        ]);
    }
}



