<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsersListController extends AbstractController
{
    #[Route('/interface/users-list', name: 'app_users_list')]
    public function index(): Response
    {
        return $this->render('users_list/index.html.twig');
    }
}
