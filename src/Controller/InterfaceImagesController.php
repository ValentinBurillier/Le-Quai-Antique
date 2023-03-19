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
        $resources = scandir('./assets/images/recettes/');
        $repertory = './assets/images/recettes/';
        unset($resources[0]);
        unset($resources[1]);
        $form = $this->createForm(ImagesRecipesType::class);
        return $this->render('interface_images/index.html.twig', [
            'resources' => $resources,
            'repertory' => $repertory,
            'form' => $form->createView(),
            'textbtn' => 'Valider',
        ]);
    }
}
