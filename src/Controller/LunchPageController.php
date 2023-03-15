<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LunchPageController extends AbstractController
{
    #[Route('/reservation/dejeuner', name: 'app_lunch_page')]
    public function index(): Response
    {
        if (!isset($_COOKIE['hour'])) {
            $disabled = 'disabled';
        } else {
            $disabled = 'enable';
        }
        $linkButton = '/reservation/details';
        $textbtn = '';
        $displayArrowLeft = false;
        return $this->render('reservation_dejeuner/index.html.twig', [
            'displayArrowLeft' => $displayArrowLeft,
            'linkButton' => $linkButton,
            'textbtn' => $textbtn,
            'disabled' => $disabled,
        ]);
    }
}
