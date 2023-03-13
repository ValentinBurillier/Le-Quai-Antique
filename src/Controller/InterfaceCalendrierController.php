<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InterfaceCalendrierController extends AbstractController
{
    #[Route('/interface/calendrier', name: 'app_interface_calendrier')]
    public function index(): Response
    {
        $displayArrowLeft = true;
        return $this->render('interface_calendrier/index.html.twig', [
            'displayArrowLeft' => $displayArrowLeft,
        ]);
    }
}
