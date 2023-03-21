<?php

namespace App\Controller;

use App\Repository\ContactRestaurantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FelicitationController extends AbstractController
{
    #[Route('/felicitation', name: 'app_felicitation')]
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

        $linkButton = '/';
        $disabled = 'enable';
        $getPhoneNumber = $contactRestaurantRepository->find(1)->getPhonenumber();
        $phoneNumber = "0$getPhoneNumber";
        return $this->render('felicitation/index.html.twig', [
            'access' => $access,
            'connect' => $connect,
            'phoneNumber' => $phoneNumber,
            'disabled' => $disabled,
            'linkButton' => $linkButton,

        ]);
    }
}
