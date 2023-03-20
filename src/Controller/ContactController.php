<?php

namespace App\Controller;

use App\Repository\ContactRestaurantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(ContactRestaurantRepository $contactRestaurantRepository): Response
    {
        $connect = false;
        if ($this->getUser() !== null) {
            $user = $this->getUser()->getUserIdentifier();
        } if(isset($user) && ($user !== null) && ($user !== '')) {
            $connect = true;
            }
        
        $link = $contactRestaurantRepository->find(1);
        return $this->render('contact/index.html.twig', [
            'link' => $link,
            'connect' => $connect,
        ]);
    }
}
