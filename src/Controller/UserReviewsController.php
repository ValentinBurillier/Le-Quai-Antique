<?php

namespace App\Controller;

use App\Repository\ReviewsTypeRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user')]
class UserReviewsController extends AbstractController
{
    #[Route('/reviews', name: 'app_user_reviews')]
    public function index(ReviewsTypeRepository $reviewsTypeRepository, ManagerRegistry $getDoctrine): Response
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
        
        if(isset($_COOKIE['suppr']) && ($_COOKIE['suppr'] !== '') && ($_COOKIE['suppr'] !== null)) {
            $delete = $reviewsTypeRepository->find($_COOKIE['suppr']);
            $entityManager = $getDoctrine->getManager();
            $entityManager->remove($delete);
            $entityManager->flush();
            unset($_COOKIE['suppr']);
            setcookie('suppr', '', time() - 3600, '/');
        }
        $email = $this->getUser()->getUserIdentifier();
        $datas = $reviewsTypeRepository->findBy([
            'email' => $email,
        ]);
        $count = (count($datas));
        return $this->render('user_reviews/index.html.twig', [
            'access' => $access,
            'connect' => $connect,
            'datas' => $datas,
            'count' => $count,
        ]);
    }
}
