<?php

namespace App\Controller;

use App\Repository\EntreesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EntreesController extends AbstractController
{
    #[Route('/entrees', name: 'app_entrees')]
    public function index(EntreesRepository $entreesList): Response
    {
        $title = 'Entrées';
        $linkLeft = "/menu";
        $linkRight = "/plats";
        $linkButton = "/reservation/date";
        $displayArrowLeft = true;
        $displayArrowRight = true; 

        // DATABASE DATA RECOVERY
        $items = $entreesList->findAll();
        return $this->render('entrees/index.html.twig', [
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
