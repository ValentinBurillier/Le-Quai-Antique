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
        $linkButton = '/';
        $disabled = 'enable';
        $getPhoneNumber = $contactRestaurantRepository->find(1)->getPhonenumber();
        $phoneNumber = "0$getPhoneNumber";
        return $this->render('felicitation/index.html.twig', [
            'phoneNumber' => $phoneNumber,
            'disabled' => $disabled,
            'linkButton' => $linkButton,

        ]);
    }
}
