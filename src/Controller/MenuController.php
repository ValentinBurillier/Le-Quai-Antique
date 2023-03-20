<?php

namespace App\Controller;

use App\Entity\Formulas;
use App\Repository\FormulasRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenuController extends AbstractController
{
    #[Route('/menu', name: 'app_menu')]
    public function index(FormulasRepository $formulasRepository): Response
    {   $disabled = 'enable';
        $linkLeft = null;
        $linkRight = "/entrees";
        $linkButton = "/reservation/date";
        $displayArrowLeft = false;
        $displayArrowRight = true; 

        $connect = false;
        if ($this->getUser() !== null) {
            $user = $this->getUser()->getUserIdentifier();
        } if(isset($user) && ($user !== null) && ($user !== '')) {
            $connect = true;
            }
        
        // DATABASE DATA RECOVERY
        $items = $formulasRepository->find(1);
        return $this->render('menu/index.html.twig', [
            'connect' => $connect,
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
