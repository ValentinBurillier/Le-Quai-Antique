<?php

namespace App\Controller;

use App\Repository\InfosUsersRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsersListController extends AbstractController
{

    #[Route('/interface/users-list', name: 'app_users_list')]
    public function index(UserRepository $userRepository, InfosUsersRepository $infosUsersRepository): Response
    {
        /* INIT VARIABLES */
        $thirdArray = [];
        $lastName = '';
        $firstName = '';
        $phoneNumber = '';

        /* VERIFY IF USER IS CONNECTED */
        $connect = false;
        if ($this->getUser() !== null) {
            $user = $this->getUser()->getUserIdentifier();
        } if(isset($user) && ($user !== null) && ($user !== '')) {
            $connect = true;
            }

        /* GET EMAILS AND STOCK IN USERS VARIABLE */
        $datas = $userRepository->findAll();
        $users = [];
        foreach($datas as $data) {
            $users[] = $data->getEmail();
        }

        $secondArray = [];
        foreach($users as $user) {
            $secondArray[] = $infosUsersRepository->findBy([
                'email' => $user,
            ]);
            
            foreach($secondArray as $datasUsers) {
                if ($datasUsers !== []) {
                    $thirdArray[] = $datasUsers;
                }
            }
        }

        return $this->render('users_list/index.html.twig', [
            'connect' => $connect,
            'thirdArray' => $thirdArray,
        ]);
    }
}
