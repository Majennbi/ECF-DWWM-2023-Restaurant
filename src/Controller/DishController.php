<?php

namespace App\Controller;

use App\Entity\Dish;
use App\Form\DishType;
use App\Repository\DishRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DishController extends AbstractController
{
    /**
     * @param DishRepository $repository
     * @return Response
     */
    
    #[Route('/dish', name: 'dish.index', methods: ['GET'])]
    public function index(DishRepository $repository): Response
    {  
        return $this->render('pages/dish/index.html.twig', [
            'dishes' => $repository->findAll() //[] *Test message si données non récupérées*
            
        ]);
    }


    /**
     * This controller show a form to create a new dish
     * 
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @return Response
     */

    #[Route('/dish/new', 'dish.new', methods: ['GET', 'POST'])]
    public function new (
        Request $request,
        EntityManagerInterface $manager
        ): Response
    {
        $dish = new Dish();
        $form = $this->createForm(DishType::class, $dish);

        $form ->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $dish = $form->getData();

            $manager->persist($dish);
            $manager->flush();

            $this->addFlash('success', 'Le plat a bien été ajouté !');

            return $this->redirectToRoute('dish.index');
            
        }

        return $this->render('pages/dish/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * This controller show a form to edit a dish
        * 
        * @param Dish $dish
        * @param Request $request
        * @param EntityManagerInterface $manager
        * @return Response
    */
        
    
    #[Route('/dish/edit/{id}', 'dish.edit', methods:['GET', 'POST'])]
    public function edit(
        Dish $dish, 
        Request $request, 
        EntityManagerInterface $manager
        ) : Response
    {   
        $form = $this->createForm(DishType::class, $dish);

        $form ->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $dish = $form->getData();

            $manager->persist($dish);
            $manager->flush();

            $this->addFlash('success', 'Le plat a bien été modifié !');

            return $this->redirectToRoute('dish.index');
            
        }

        return $this->render('pages/dish/edit.html.twig'
        , [
            'form' => $form->createView()
        ]);
    }  


    /**
     * This controller delete a dish
     * 
     * @param EntityManagerInterface $manager
     * @param Dish $dish
     * @return Response
     */

    #[Route('/dish/delete/{id}', 'dish.delete', methods: ['GET'])]
    public function delete(
        EntityManagerInterface $manager,
         Dish $dish
         ) : Response
    {

        $manager ->remove($dish);
        $manager ->flush();

        $this->addFlash('success', "Le plat a bien été supprimé !");

        return $this->redirectToRoute('dish.index');
        } 
}



