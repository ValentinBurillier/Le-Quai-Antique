<?php

namespace App\Controller;

use App\Form\ConnectType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConnectController extends AbstractController
{
    #[Route('/connect', name: 'app_connect')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(ConnectType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dd($form->getData());
        }
        return $this->render('connect/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
