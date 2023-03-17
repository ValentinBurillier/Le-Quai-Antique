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
            'datas' => $datas,
            'count' => $count,
        ]);
    }
}
