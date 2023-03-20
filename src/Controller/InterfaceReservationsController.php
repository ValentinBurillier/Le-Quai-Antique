<?php

namespace App\Controller;

use App\Entity\Reservations;
use App\Repository\ReservationsRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InterfaceReservationsController extends AbstractController
{
    #[Route('/interface/reservations', name: 'app_interface_reservations')]
    public function index(ReservationsRepository $reservationsRepository, ManagerRegistry $getDoctrine): Response
    {
        /* VERIFY IF USER IS CONNECTED */
        $connect = false;
        if ($this->getUser() !== null) {
            $user = $this->getUser()->getUserIdentifier();
        } if(isset($user) && ($user !== null) && ($user !== '')) {
            $connect = true;
            }
        
        $cookie = '';
        if(isset($_COOKIE['suppr']) && $_COOKIE['suppr'] !== '') {
            $newCookie = $_COOKIE['suppr'];
            $infos = explode(" ", $newCookie);
            unset($infos[2]);
            unset($infos[4]);
            unset($infos[6]);
            
            $firstName = $infos[1];
            $lastName = $infos[0];
            $hour = $infos[5];
            $date = $infos[7];

            $user = $reservationsRepository->findOneBy([
                'firstName' => $firstName,
                'lastName' => $lastName,
                'slotoftheday' => $hour,
                'dateofreservation' => $date,
            ]);

            if(isset($user)) {
                $entityManager = $getDoctrine->getManager();
                $entityManager->remove($user);
                $entityManager->flush();
                unset($_COOKIE['suppr']);
                setcookie('suppr', '', time() - 4200, '/');
            }
           
        }

        /* RECUPERATION DES DONNEES ET TRIER */
        $datas = $reservationsRepository->findBy(array(), array('dateofreservation' => 'asc'));
        return $this->render('interface_reservations/index.html.twig', [
            'connect' => $connect,
            'datas' => $datas,
        ]);
    }
}
