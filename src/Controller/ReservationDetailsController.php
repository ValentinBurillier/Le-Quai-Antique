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
        if (!isset($_COOKIE['number']) && !isset($_COOKIE['allergy'])) {
            $disabled = 'disabled';
        } else {
            $disabled = 'enable';
        }
        $linkButton = '/confirm/booking';
        $textbtn = 'Continuer';
        return $this->render('reservation_details/index.html.twig', [
            'linkButton' => $linkButton,
            'textbtn' => $textbtn,
            'disabled' => $disabled,
        ]);
    }
}
