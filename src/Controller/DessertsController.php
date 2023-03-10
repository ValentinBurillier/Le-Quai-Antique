<?php

namespace App\Controller;

use App\Repository\DessertsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DessertsController extends AbstractController
{
    #[Route('/desserts', name: 'app_desserts')]
    public function index(DessertsRepository $dessertsRepository): Response
    {
        $items = $dessertsRepository->findAll();
        return $this->render('desserts/index.html.twig', [
            'controller_name' => 'DessertsController',
            'items' => $items,
        ]);
    }
}
