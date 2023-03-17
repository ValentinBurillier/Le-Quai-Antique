<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user')]
class UserAllergyController extends AbstractController
{
    #[Route('/allergy', name: 'app_user_allergy')]
    public function index(): Response
    {
        return $this->render('user_allergy/index.html.twig', [
            'controller_name' => 'UserAllergyController',
        ]);
    }
}
