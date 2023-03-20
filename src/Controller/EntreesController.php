<?php

namespace App\Controller;

use App\Repository\EntreesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EntreesController extends AbstractController
{
    #[Route('/entrees', name: 'app_entrees')]
    public function index(EntreesRepository $entreesList): Response
    {
        $disabled = 'enable';
        $title = 'Entrées';
        $linkLeft = "/menu";
        $linkRight = "/plats";
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
        $items = $entreesList->findAll();
        return $this->render('entrees/index.html.twig', [
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
