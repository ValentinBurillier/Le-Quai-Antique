<?php

namespace App\Controller;

use App\Repository\WinesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VinsController extends AbstractController
{
    #[Route('/vins', name: 'app_vins')]
    public function index(WinesRepository $winesRepository): Response
    {
        $vR1 = $winesRepository->find(1);
        $vR2 = $winesRepository->find(2);
        $vR3 = $winesRepository->find(3);
        $vb4 = $winesRepository->find(4);
        $vb5 = $winesRepository->find(5);
        $vr6 = $winesRepository->find(6);
        $vr7 = $winesRepository->find(7);
        
        return $this->render('vins/index.html.twig', [
            'controller_name' => 'VinsController',
            'vR1' => $vR1,
            'vR2' => $vR2,
            'vR3' => $vR3,
            'vb4' => $vb4,
            'vb5' => $vb5,
            'vr6' => $vr6,
            'vr7' => $vr7
        ]);
    }
}
