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
        if (!isset($_COOKIE['date'])) {
            $disabled = 'disabled';
        } else {
            $disabled = 'enable';
        }
        $linkButton = '/reservation/dejeuner';
        $textbtn = '';
        $displayArrowLeft = false;
        return $this->render('reservation_date/index.html.twig', [
            'displayArrowLeft' => $displayArrowLeft,
            'linkButton' => $linkButton,
            'textbtn' => $textbtn,
            'disabled' => $disabled,
        ]);
    }
}
