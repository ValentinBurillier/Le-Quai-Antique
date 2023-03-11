<?php

namespace App\Controller;

use App\Repository\WinesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VinsController extends AbstractController
{
    #[Route('/vins', name: 'app_vins')]
    public function index(WinesRepository $winesRepository): Response
    {
        $items = $winesRepository->findAll();
        foreach ($items as $v => $u) {
            dump($u);
            dump($u->getCategory());
            dump(gettype($u));
        }
        die;
        return $this->render('vins/index.html.twig', [
            'controller_name' => 'VinsController',
            'items' => $items
        ]);
    }
}
