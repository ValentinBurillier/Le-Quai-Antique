<?php

namespace App\Controller;

use App\Repository\DishesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlatsController extends AbstractController
{
    #[Route('/plats', name: 'app_plats')]
    public function index(DishesRepository $dishesRepository): Response
    {
        $items = $dishesRepository->findAll();
        return $this->render('plats/index.html.twig', [
            'items' => $items,
        ]);
    }
}
