<?php

namespace App\Controller;

use App\Repository\ReviewsTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InterfaceAvisClientsController extends AbstractController
{
    #[Route('/interface/avis-clients', name: 'app_interface_avis_clients')]
    public function index(ReviewsTypeRepository $reviewsTypeRepository): Response
    {
        $datas = $reviewsTypeRepository->findAll();
        return $this->render('interface_avis_clients/index.html.twig', [
            'datas' => $datas,
        ]);
    }
}
