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
        $link = $contactRestaurantRepository->find(1);
        return $this->render('contact/index.html.twig', [
            'link' => $link
        ]);
    }
}
