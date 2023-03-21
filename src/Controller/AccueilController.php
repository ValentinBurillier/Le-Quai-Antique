<?php

namespace App\Controller;

use App\Entity\ContactRestaurant;
use App\Repository\ContactRestaurantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(ContactRestaurantRepository $contactRestaurantRepository): Response
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
    
        $phone = $contactRestaurantRepository->find(1)->getPhonenumber();
        $phoneNumber = '0'.$phone;
        $email = $contactRestaurantRepository->find(1)->getEmail();
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
            'access' => $access,
            'phoneNumber' => $phoneNumber,
            'email' => $email,
            'repertory' => $repertory,
            'resources' => $resources,
            'platImgs' => $imgs,
            'platPath' => $platPath,
            'y' => $y,
            'linkButton' => $linkButton,
            'disabled' => $disabled,
            'textbtn' => $textbtn,
            'connect' => $connect,
        ]);
    }
}
