<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationDetailsController extends AbstractController
{
    #[Route('/reservation/details', name: 'app_reservation_details')]
    public function index(): Response
    {
        $linkButton = '#';
        $textbtn = 'Continuer';
        return $this->render('reservation_details/index.html.twig', [
            'linkButton' => $linkButton,
            'textbtn' => $textbtn
        ]);
    }
}
