<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(): Response
    {
        $resources = scandir('./assets/images/recettes/');
        $repertory = './assets/images/recettes/';
        unset($resources[0]);
        unset($resources[1]);
        return $this->render('accueil/index.html.twig', [
            'repertory' => $repertory,
            'resources' => $resources,
        ]);
    }
}
