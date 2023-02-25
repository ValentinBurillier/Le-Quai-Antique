<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserCommentaireController extends AbstractController
{
    #[Route('/user/commentaire', name: 'app_user_commentaire')]
    public function index(): Response
    {
        return $this->render('user_commentaire/index.html.twig');
    }
}
