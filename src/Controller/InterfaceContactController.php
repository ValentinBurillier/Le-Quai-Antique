<?php

namespace App\Controller;

use App\Form\ContactInterfaceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InterfaceContactController extends AbstractController
{
    #[Route('/interface/contact', name: 'app_interface_contact')]
    public function index(): Response
    {
        $form = $this->createForm(ContactInterfaceType::class);
        return $this->render('interface_contact/index.html.twig', [
            'form' => $form,
        ]);
    }
}
