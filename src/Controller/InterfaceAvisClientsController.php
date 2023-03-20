<?php

namespace App\Controller;

use App\Repository\ReviewsTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InterfaceAvisClientsController extends AbstractController
{
    #[Route('/interface/avis-clients', name: 'app_interface_avis_clients')]
    public function index(ReviewsTypeRepository $reviewsTypeRepository): Response
    {
        /* VERIFY IF USER IS CONNECTED */
        $connect = false;
        if ($this->getUser() !== null) {
            $user = $this->getUser()->getUserIdentifier();
        } if(isset($user) && ($user !== null) && ($user !== '')) {
            $connect = true;
            }
        
        $datas = $reviewsTypeRepository->findAll();
        return $this->render('interface_avis_clients/index.html.twig', [
            'connect' => $connect,
            'datas' => $datas,
        ]);
    }
}
