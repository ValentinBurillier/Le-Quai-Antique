<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationDetailsController extends AbstractController
{
    #[Route('/reservation/details', name: 'app_reservation_details')]
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
        
        if (!isset($_COOKIE['number']) && !isset($_COOKIE['allergy'])) {
            $disabled = 'disabled';
        } else {
            $disabled = 'enable';
        }
        $linkButton = '/confirm/booking';
        $textbtn = 'Continuer';
        return $this->render('reservation_details/index.html.twig', [
            'access' => $access,
            'connect' => $connect,
            'linkButton' => $linkButton,
            'textbtn' => $textbtn,
            'disabled' => $disabled,
        ]);
    }
}
