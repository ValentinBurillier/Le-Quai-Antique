<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FelicitationController extends AbstractController
{
    #[Route('/felicitation', name: 'app_felicitation')]
    public function index(): Response
    {
        return $this->render('felicitation/index.html.twig');
    }
}
