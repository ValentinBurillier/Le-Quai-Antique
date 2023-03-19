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
        $i = 1;
        /* STORAGE NEW IMAGES */
        if(isset($_FILES[1]) && ($_FILES[1]['error'] === 0)) {
            $img1 = $_FILES[1]['tmp_name'];
            unlink('./assets/images/recettes/recette1.jpg');
            move_uploaded_file($img1, './assets/images/recettes/recette1.jpg');
            unset($_FILES);
        };

        if(isset($_FILES[2]) && ($_FILES[2]['error'] === 0)) {
            $img2 = $_FILES[2]['tmp_name'];
            move_uploaded_file($img2, './assets/images/recettes/recette2.jpg');
            unset($_FILES);
        };
        if(isset($_FILES[3]) && ($_FILES[3]['error'] === 0)) {
            $img3 = $_FILES[3]['tmp_name'];
            move_uploaded_file($img3, './assets/images/recettes/recette3.jpg');
            unset($_FILES);
        };
        // <img src="{{asset('assets/images/recettes/recette1.jpg')}}"> 
        $pathStart = '/assets/images/recettes/';

        $resources = scandir('./assets/images/recettes/');
        $repertory = './assets/images/recettes/';
        unset($resources[0]);
        unset($resources[1]); /* Index index à 2 */
   
        return $this->render('interface_images/index.html.twig', [
            'resources' => $resources,
            'repertory' => $repertory,
            'textbtn' => 'Valider',
            'pathStart' => $pathStart,
            'i' => $i,
        ]);
    }
}
