<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LunchPageController extends AbstractController
{
    #[Route('/lunch/page', name: 'app_lunch_page')]
    public function index(): Response
    {
        return $this->render('lunch_page/index.html.twig');
    }
}
