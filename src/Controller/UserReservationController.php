<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user')]
class UserReservationController extends AbstractController
{
    #[Route('/reservation', name: 'app_user_reservation')]
    public function index(): Response
    {
        return $this->render('user_reservation/index.html.twig', [
            'controller_name' => 'UserReservationController',
        ]);
    }
}
