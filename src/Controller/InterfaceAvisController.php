<?php

namespace App\Controller;

use App\Repository\ReviewsTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InterfaceAvisController extends AbstractController
{
    #[Route('/interface/avis', name: 'app_interface_avis')]
    public function index(ReviewsTypeRepository $reviewsTypeRepository): Response
    {
        $datas = $reviewsTypeRepository->findAll();
        return $this->render('interface_avis/index.html.twig', [
            'datas' => $datas,
        ]);
    }
}
