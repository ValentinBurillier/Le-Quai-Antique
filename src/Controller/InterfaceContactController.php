<?php

namespace App\Controller;

use App\Entity\ContactRestaurant;
use App\Form\ContactInterfaceType;
use App\Repository\ContactRestaurantRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InterfaceContactController extends AbstractController
{
    #[Route('/interface/contact', name: 'app_interface_contact')]
    public function index(Request $request, ContactRestaurantRepository $contact, ManagerRegistry $getDoctrine): Response
    {
        $contact = new ContactRestaurant();
        $form = $this->createForm(ContactInterfaceType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // RECUP ID 1 BDD ----
            $id = $getDoctrine->getManager();
            $user = $id->getRepository(ContactRestaurant::class)->find(1);
            // -----

            $phoneNumber = $form['phonenumber']->getData();
            $user->setPhonenumber($phoneNumber);
            
            $email = $form['email']->getData();
            $user->setEmail($email);

            $facebook = $form['facebook']->getData();
            $user->setFacebook($facebook);

            $instagram = $form['instagram']->getData();
            $user->setInstagram($instagram); 


            // $contact->setPhonenumber($phoneNumber);
            // $contact->setEmail($email);
            // $contact->setFacebook($facebook);
            // $contact->setInstagram($instagram);

            $entityManager = $getDoctrine->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
        }
        return $this->render('interface_contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
