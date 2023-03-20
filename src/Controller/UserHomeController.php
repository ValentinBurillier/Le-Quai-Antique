<?php

namespace App\Controller;

use App\Entity\ReviewsType;
use App\Repository\ReservationsRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use tidy;

class UserHomeController extends AbstractController
{
    #[Route('/user/home', name: 'app_user_home')]
    public function index(ReservationsRepository $reservationsRepository, ManagerRegistry $getDoctrine): Response
    {
        /* INIT VARIABLES */
        $review = new ReviewsType();
        $dateReservation = null;
        $todayDate = date('d/m/y');
        $display = false;
        $email = $this->getUser()->getUserIdentifier();
        $reservations = $reservationsRepository->findBy([
            'email' => $email,
        ]);

        /* On vérifie si user à une réservation passée */
        if($reservations !== []) {
            if (isset($reservations[0])) {
                $dateReservation = $reservations[0]->getDateofreservation();
                $newDateReservation = strtotime($dateReservation);
                if ($newDateReservation < time()) {
                    $display = true;
                    if(isset($_COOKIE['review']) && ($_COOKIE['review'] !== null) && ($_COOKIE['review'] !== '')) {
                        $review->setDate($todayDate);
                        $review->setEmail($email);
                        $review->setReview($_COOKIE['review']);
                
                        $entityManager = $getDoctrine->getManager();
                        $entityManager->persist($review);
                        $entityManager->remove($reservations[0]);
                        $entityManager->flush();
            
                        unset($_COOKIE['review']);
                        setcookie('review', '', time() - 3600, '/');
                    }
                }
            }
        }
        
        return $this->render('user_home/index.html.twig', [
            'display' => $display,
        ]);
    }
}
