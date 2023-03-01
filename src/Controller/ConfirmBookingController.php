<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConfirmBookingController extends AbstractController
{
    #[Route('/confirm/booking', name: 'app_confirm_booking')]
    public function index(): Response
    {
        return $this->render('confirm_booking/index.html.twig', [
            'controller_name' => 'ConfirmBookingController',
        ]);
    }
}
