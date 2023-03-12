<?php

namespace App\Controller;

use App\Entity\Formulas;
use App\Repository\FormulasRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenuController extends AbstractController
{
    #[Route('/menu', name: 'app_menu')]
    public function index(FormulasRepository $formulasRepository): Response
    {
        $items = $formulasRepository->find(1);
        return $this->render('menu/index.html.twig', [
            'items' => $items,
        ]);
    }
}
