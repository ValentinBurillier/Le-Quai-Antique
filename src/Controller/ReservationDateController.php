<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationDateController extends AbstractController
{
    #[Route('/reservation/date', name: 'app_reservation_date')]
    public function index(): Response
    {
        $displayArrowLeft = false;
        return $this->render('reservation_date/index.html.twig', [
            'displayArrowLeft' => $displayArrowLeft,
        ]);
    }
}
