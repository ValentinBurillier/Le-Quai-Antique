<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(): Response
    {
        $y = 0;
        $linkButton = '/reservation';
        $disabled = 'enable';
        $textbtn = 'Réservez votre table dès maintenant';

        /* IMPORT FIRST HOME PAGE IMAGES */
        $resources = scandir('./assets/images/recettes/');
        $repertory = './assets/images/recettes/';
        unset($resources[0]);
        unset($resources[1]);

        /* IMPORT SECOND IMAGES PAGE */
        $imgs = scandir('./assets/images/plats/');
        $platPath = './assets/images/plats/';
        unset($imgs[0]);
        unset($imgs[1]);

        return $this->render('accueil/index.html.twig', [
            'repertory' => $repertory,
            'resources' => $resources,
            'platImgs' => $imgs,
            'platPath' => $platPath,
            'y' => $y,
            'linkButton' => $linkButton,
            'disabled' => $disabled,
            'textbtn' => $textbtn,
        ]);
    }
}
