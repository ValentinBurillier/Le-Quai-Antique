<?php

namespace App\Controller;

use App\Repository\EntreesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EntreesController extends AbstractController
{
    #[Route('/entrees', name: 'app_entrees')]
    public function index(EntreesRepository $entreesList): Response
    {
        // DATABASE DATA RECOVERY
        $entrees = $entreesList->findAll();
        return $this->render('entrees/index.html.twig', [
            'controller_name' => 'EntreesController',
            'entrees' => $entrees,
        ]);
    }
}
