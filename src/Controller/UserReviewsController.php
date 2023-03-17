<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user')]
class UserReviewsController extends AbstractController
{
    #[Route('/reviews', name: 'app_user_reviews')]
    public function index(): Response
    {
        return $this->render('user_reviews/index.html.twig', [
            'controller_name' => 'UserReviewsController',
        ]);
    }
}
