<?php

namespace App\Controller;

use App\Form\ImagesRecipesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InterfaceImagesController extends AbstractController
{
    #[Route('/interface/images', name: 'app_interface_images')]
    public function index(): Response
    {
        $form = $this->createForm(ImagesRecipesType::class);
        return $this->render('interface_images/index.html.twig', [
            'controller_name' => 'InterfaceImagesController',
            'form' => $form->createView(),
        ]);
    }
}
