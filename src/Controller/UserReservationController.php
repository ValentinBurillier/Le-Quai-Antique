<?php

namespace App\Controller;

use App\Repository\ReservationsRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user')]
class UserReservationController extends AbstractController
{
    #[Route('/reservation', name: 'app_user_reservation')]
    public function index(ReservationsRepository $reservationsRepository, ManagerRegistry $getDoctrine): Response
    {
        /* INIT VARIABLES */
        $dateReservation = '';
        $hourReservation = '';
        $number = '';
        $display = false;
        $displayText = 'Aucune réservation en cours';

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
        
        /* REMOVE RESERVATION*/
        if(isset($_COOKIE['suppr']) && ($_COOKIE['suppr'] === 'suppr')) {
            $email = $this->getUser()->getUserIdentifier();
            $reservationData = $reservationsRepository->findBy([
            'email' => $email,
            ]);
            $entityManager = $getDoctrine->getManager();
            $entityManager->remove($reservationData[0]);
            $entityManager->flush();
            unset($_COOKIE['suppr']);
            setcookie('suppr', '', time() - 4200, '/');

        };

        $email = $this->getUser()->getUserIdentifier();
        $reservationData = $reservationsRepository->findBy([
            'email' => $email,
        ]);
        
        $date = date('d-m-y');
        $newDate = str_replace('-', '/', $date); /* TODAY DATE IN NEW FORMAT*/

        if (isset($reservationData[0]) && ($reservationData[0] !== []) && ($reservationData[0] !== '')) {
            $dateReservationUser = $reservationData[0]->getDateofreservation();

             /* COMPARE BOOKING DATE AND TODAY DATE AND RETURN THE FIRST RESERVATION  */
            if ($dateReservationUser >= $newDate) {
                $display = true;
                $dateReservation = $dateReservationUser;
                $hourReservation = $reservationData[0]->getSlotoftheday();
                $number = $reservationData[0]->getNumberofpersons();
                $displayText = null;
            
            } else {
                $display = false;
            }
        }
             
        return $this->render('user_reservation/index.html.twig', [
            'access' => $access,
            'connect' => $connect,
            'date' => $dateReservation,
            'hour' => $hourReservation,
            'number' => $number,
            'display' => $display,
            'displayText' => $displayText,
        ]);
    }
}
