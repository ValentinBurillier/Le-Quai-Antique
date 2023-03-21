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

            $access = '';
            if ($this->getUser()) {
                if ($this->getUser()->getRoles()[0] == 'ROLE_ADMIN') {
                    $access = true;
                } else if (($this->getUser()->getRoles()[0] == 'ROLE_USER')) {
                    $access = false;
                }
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
            'access' => $access,
            'connect' => $connect,
            'displayArrowLeft' => $displayArrowLeft,
            'linkButton' => $linkButton,
            'linkButton2' => $linkButton2,
            'textbtn' => $textbtn,
            'disabled' => $disabled,
        ]);
    }
}
