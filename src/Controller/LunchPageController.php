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
        $connect = false;
        if ($this->getUser() !== null) {
            $user = $this->getUser()->getUserIdentifier();
        } if(isset($user) && ($user !== null) && ($user !== '')) {
            $connect = true;
            }

        if (!isset($_COOKIE['hour'])) {
            $disabled = 'disabled';
        } else {
            $disabled = 'enable';
        }
        $linkButton = '/reservation/details';
        $linkButton2 = '/reservation/diner';
        $textbtn = '';
        $displayArrowLeft = false;
        return $this->render('reservation_dejeuner/index.html.twig', [
            'connect' => $connect,
            'displayArrowLeft' => $displayArrowLeft,
            'linkButton' => $linkButton,
            'linkButton2' => $linkButton2,
            'textbtn' => $textbtn,
            'disabled' => $disabled,
        ]);
    }
}
