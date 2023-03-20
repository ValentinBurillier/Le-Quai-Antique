<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationDateController extends AbstractController
{
    #[Route('/reservation/date', name: 'app_reservation_date')]
    public function index(): Response
    {
        $connect = false;
        if ($this->getUser() !== null) {
            $user = $this->getUser()->getUserIdentifier();
        } if(isset($user) && ($user !== null) && ($user !== '')) {
            $connect = true;
            }
        
        if (!isset($_COOKIE['date'])) {
            $disabled = 'disabled';
        } else {
            $disabled = 'enable';
        }
        $linkButton = '/reservation/dejeuner';
        $textbtn = '';
        $displayArrowLeft = false;
        return $this->render('reservation_date/index.html.twig', [
            'connect' => $connect,
            'displayArrowLeft' => $displayArrowLeft,
            'linkButton' => $linkButton,
            'textbtn' => $textbtn,
            'disabled' => $disabled,
        ]);
    }
}
