<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\InfosUsersType;
use App\Repository\InfosUsersRepository;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Config\SecurityConfig;

#[Route('/user')]
class InformationsController extends AbstractController
{
    #[Route('/informations', name: 'app_informations')]
    public function index(LoggerInterface $loggerInterface, InfosUsersRepository $infosUsersRepository, Request $request, ManagerRegistry $getDoctrine): Response
    {
        $connect = false;
        if ($this->getUser() !== null) {
            $user = $this->getUser()->getUserIdentifier();
        } if(isset($user) && ($user !== null) && ($user !== '')) {
            $connect = true;
            }
        
        /* GET EMAIL CONNECTED USER */
        $email = $this->getUser()->getUserIdentifier();
    
        /* GET USER INFOS */
        $user = $infosUsersRepository->findBy([
            'email' => $email]);

        if(isset($user) && $user !== '' && isset($user[0])) {
            $firstName = $user[0]->getFirstName();
            $lastName = $user[0]->getLastName();
            $phoneNumber = $user[0]->getPhoneNumber();
            $email = $user[0]->getEmail();
            $number = $user[0]->getNumber();
        } else {
            $firstName = '';
            $lastName = '';
            $phoneNumber = '';
            $number = '';
        }
        $form = $this->createForm(InfosUsersType ::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user[0]->setFirstName($form['firstName']->getData());
            $user[0]->setNumber(intval($form['lastName']->getData()));
            $user[0]->setPhoneNumber($form['phoneNumber']->getData());
            $user[0]->setNumber($form['number']->getData());

            $entityManager = $getDoctrine->getManager();
            $entityManager->persist($user[0]);
            $entityManager->flush();            
        }
        return $this->render('informations/index.html.twig', [
            'connect' => $connect,
            'firstName' =>$firstName,
            'lastName' =>$lastName,
            'phoneNumber' => $phoneNumber,
            'email' => $email,
            'number' => $number,
            'form' => $form->createView(),
            'textbtn' => 'Confirmer',
        ]);
    }
}
