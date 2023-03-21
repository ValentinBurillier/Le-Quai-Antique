<?php

namespace App\Controller;

use App\Repository\DessertsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DessertsController extends AbstractController
{
    #[Route('/desserts', name: 'app_desserts')]
    public function index(DessertsRepository $dessertsRepository): Response
    {
        $disabled = 'enable';
        $title = 'Desserts';
        $linkLeft = "/plats";
        $linkRight = "/vins";
        $linkButton = "/reservation/date";
        $displayArrowLeft = true;
        $displayArrowRight = true;
        
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

        // DATABASE DATA RECOVERY
        $items = $dessertsRepository->findAll();
        return $this->render('desserts/index.html.twig', [
            'access' => $access,
            'connect' => $connect,
            'title' => $title,
            'linkLeft' => $linkLeft,
            'linkRight' => $linkRight,
            'linkButton' => $linkButton,
            'displayArrowLeft' => $displayArrowLeft,
            'displayArrowRight' => $displayArrowRight,
            'items' => $items,
            'disabled' => $disabled,
        ]);
    }
}
