<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InterfaceCarteController extends AbstractController
{
    #[Route('/interface/carte', name: 'app_interface_carte')]
    public function index(): Response
    {
        return $this->render('interface_carte/index.html.twig', [
            'controller_name' => 'InterfaceCarteController',
        ]);
    }
}
