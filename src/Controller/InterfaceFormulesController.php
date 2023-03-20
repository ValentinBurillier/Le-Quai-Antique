<?php

namespace App\Controller;

use App\Entity\Formulas;
use App\Form\FormulesType;
use App\Repository\FormulasRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InterfaceFormulesController extends AbstractController
{
    #[Route('/interface/formules', name: 'app_interface_formules')]
    public function index(FormulasRepository $formulasRepository, ManagerRegistry $getDoctrine, Request $request): Response
    {
        /* GET FORMULAS DATA */
        $data = $formulasRepository->find(1);
        $entreeAndDish = $data->getEntreeanddish();
        $entreeAndDessert = $data->getEntreeanddessert();
        $dishAndDessert = $data->getDishanddessert();

        /* VERIFY IF USER IS CONNECTED */
        $connect = false;
        if ($this->getUser() !== null) {
            $user = $this->getUser()->getUserIdentifier();
        } if(isset($user) && ($user !== null) && ($user !== '')) {
            $connect = true;
            }
        
        /* IMPORT FORMULAS FORM */
        $form = $this->createForm(FormulesType:: class);

        /* SUBMIT DATA IN BDD */
        $form->handleRequest($request);
        // $formulas = new Formulas();
        if ($form->isSubmitted() && $form->isValid()) {
            $data->setEntreeanddish($form['entreeanddish']->getData());
            $data->setEntreeanddessert($form['entreeanddessert']->getData());
            $data->setDishanddessert($form['dishanddessert']->getData());
           
            $entityManager = $getDoctrine->getManager();
            $entityManager->persist($data);
            $entityManager->flush();
        }
       

        return $this->render('interface_formules/index.html.twig', [
            'connect' => $connect,
            'form' => $form->createView(),
            'entreeAndDish' => $entreeAndDish,
            'entreeAndDessert' => $entreeAndDessert,
            'dishAndDessert' => $dishAndDessert,
            'data' => $data,
        ]);
    }
}
