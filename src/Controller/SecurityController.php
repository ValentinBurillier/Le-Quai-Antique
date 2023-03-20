<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{

    #[Route(path: '/account', name: 'account')]
    public function account(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()->getRoles() === 'ROLE_USER') {
            dd('yes');
            return new Response ($this->redirectToRoute('app_accueil'));
        } else if ($this->getUser()->getRoles() === 'ROLE_ADMIN') {
            $this->redirectToRoute('app_interface_admin');
        }
    }

    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $connect = false;
        if ($this->getUser() !== null) {
            $user = $this->getUser()->getUserIdentifier();
        } if(isset($user) && ($user !== null) && ($user !== '')) {
            $connect = true;
            }
        // if ($this->getUser()->getRoles()) {
        //     // Si role = admin
        //     return $this->redirectToRoute('app_interface_admin');
        //     // Si role = user
        //     return $this->redirectToRoute('/user/home');
        // }
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername, 'error' => $error,
            'connect' => $connect,
        ]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        $this->redirectToRoute('app_accueil');
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
