<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DinerPageController extends AbstractController
{
    #[Route('/diner/page', name: 'app_diner_page')]
    public function index(): Response
    {
        return $this->render('diner_page/index.html.twig');
    }
}
