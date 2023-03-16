<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InterfaceReservationsController extends AbstractController
{
    #[Route('/interface/reservations', name: 'app_interface_reservations')]
    public function index(): Response
    {
        return $this->render('interface_reservations/index.html.twig', [
            'controller_name' => 'InterfaceReservationsController',
        ]);
    }
}
