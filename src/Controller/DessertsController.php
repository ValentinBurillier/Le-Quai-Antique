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
        $title = 'Desserts';
        $linkLeft = "/plats";
        $linkRight = "/vins";
        $linkButton = "/reservation/date";
        $displayArrowLeft = true;
        $displayArrowRight = true;
        
        // DATABASE DATA RECOVERY
        $items = $dessertsRepository->findAll();
        return $this->render('desserts/index.html.twig', [
            'title' => $title,
            'linkLeft' => $linkLeft,
            'linkRight' => $linkRight,
            'linkButton' => $linkButton,
            'displayArrowLeft' => $displayArrowLeft,
            'displayArrowRight' => $displayArrowRight,
            'items' => $items,
        ]);
    }
}
