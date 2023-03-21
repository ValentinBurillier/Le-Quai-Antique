<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DinerPageController extends AbstractController
{
    #[Route('/reservation/diner', name: 'app_diner_page')]
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
        $linkButton2 = '/reservation/dejeuner';
        $textbtn = '';
        $displayArrowLeft = false;
        return $this->render('diner_page/index.html.twig', [
            'access' => $access,
            'connect' => $connect,
            'linkButton2' => $linkButton2,
            'displayArrowLeft' => $displayArrowLeft,
            'linkButton' => $linkButton,
            'textbtn' => $textbtn,
            'disabled' => $disabled,
        ]);
    }
}
