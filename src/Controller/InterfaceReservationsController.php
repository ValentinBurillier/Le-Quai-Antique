<?php

namespace App\Controller;

use App\Repository\ReservationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InterfaceReservationsController extends AbstractController
{
    #[Route('/interface/reservations', name: 'app_interface_reservations')]
    public function index(ReservationsRepository $reservationsRepository): Response
    {
        /* RECUPERATION DES DONNEES ET TRIER */
        $datas = $reservationsRepository->findBy(array(), array('dateofreservation' => 'asc'));
        return $this->render('interface_reservations/index.html.twig', [
            'controller_name' => 'InterfaceReservationsController',
            'datas' => $datas,
        ]);
    }
}
