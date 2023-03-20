<?php

namespace App\Controller;

use App\Repository\DishesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlatsController extends AbstractController
{
    #[Route('/plats', name: 'app_plats')]
    public function index(DishesRepository $dishesRepository): Response
    {
        $disabled = 'enable';
        $title = 'Plats';
        $linkLeft = "/entrees";
        $linkRight = "/desserts";
        $linkButton = "/reservation/date";
        $displayArrowLeft = true;
        $displayArrowRight = true;
        
        $connect = false;
        if ($this->getUser() !== null) {
            $user = $this->getUser()->getUserIdentifier();
        } if(isset($user) && ($user !== null) && ($user !== '')) {
            $connect = true;
            }
        
        // DATABASE DATA RECOVERY
        $items = $dishesRepository->findAll();
        return $this->render('plats/index.html.twig', [
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
