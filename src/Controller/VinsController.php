<?php

namespace App\Controller;

use App\Repository\WinesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VinsController extends AbstractController
{
    #[Route('/vins', name: 'app_vins')]
    public function index(WinesRepository $winesRepository): Response
    {
        $disabled = 'enable';
        $linkLeft = "/desserts";
        $linkRight = null;
        $linkButton = "/reservation/date";
        $displayArrowLeft = true;
        $displayArrowRight = false;

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

            
        $vR1 = $winesRepository->find(1);
        $vR2 = $winesRepository->find(2);
        $vR3 = $winesRepository->find(3);
        $vb4 = $winesRepository->find(4);
        $vb5 = $winesRepository->find(5);
        $vr6 = $winesRepository->find(6);
        $vr7 = $winesRepository->find(7);
        
        // DATABASE DATA RECOVERY
        return $this->render('vins/index.html.twig', [
            'access' => $access,
            'connect' => $connect,
            'vR1' => $vR1,
            'vR2' => $vR2,
            'vR3' => $vR3,
            'vb4' => $vb4,
            'vb5' => $vb5,
            'vr6' => $vr6,
            'vr7' => $vr7,
            'linkLeft' => $linkLeft,
            'linkRight' => $linkRight,
            'linkButton' => $linkButton,
            'displayArrowLeft' => $displayArrowLeft,
            'displayArrowRight' => $displayArrowRight,
            'disabled' => $disabled,
        ]);
    }
}
