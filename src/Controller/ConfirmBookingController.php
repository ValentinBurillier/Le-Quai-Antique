<?php

namespace App\Controller;

use App\Entity\Reservations;
use App\Form\ReservationType;
use App\Repository\ReservationsRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConfirmBookingController extends AbstractController
{
    #[Route('/confirm/booking', name: 'app_confirm_booking')]
    public function index(Request $request, ReservationsRepository $reservationsRepository, ManagerRegistry $getDoctrine): Response
    {
        $connect = false;
        if ($this->getUser() !== null) {
            $user = $this->getUser()->getUserIdentifier();
        } if(isset($user) && ($user !== null) && ($user !== '')) {
            $connect = true;
            }
        
            $access = '';
            if ($this->getUser()) {
                if ($this->getUser()->getRoles()[0] == 'ROLE_ADMIN') {
                    $access = true;
                } else if (($this->getUser()->getRoles()[0] == 'ROLE_USER')) {
                    $access = false;
                }
            }

        $date = $_COOKIE['date'];
        $hour = $_COOKIE['hour'];
        $allergy = $_COOKIE['allergy'];
        $number = $_COOKIE['number'];
        
        $form = $this->createForm(ReservationType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $reser = new Reservations();
            $reser->setSlotoftheday($hour);
            $reser->setNumberofpersons($number);
            $reser->setDateofreservation($date);
            $reser->setAllergy($allergy);
            $reser->setEmail($form['email']->getData());
            $reser->setPhonenumber($form['phonenumber']->getData());
            $reser->setFirstName($form['firstName']->getData());
            $reser->setLastName($form['lastName']->getData());
            
            $entityManager = $getDoctrine->getManager();
            $entityManager->persist($reser);
            $entityManager->flush();
            return $this->redirectToRoute('app_felicitation');
        }
        return $this->render('confirm_booking/index.html.twig', [
            'access' => $access,
            'connect' => $connect,
            'form' => $form->createView(),
        ]);
    }
}
