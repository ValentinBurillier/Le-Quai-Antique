<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserAvisController extends AbstractController
{
    #[Route('/user/avis', name: 'app_user_avis')]
    public function index(): Response
    {
        return $this->render('user_avis/index.html.twig');
    }
}
