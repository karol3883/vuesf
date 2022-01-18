<?php

namespace App\Controller;

use App\DTO\UserLoginAttempDTO;
use App\Services\RequestDataService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

use App\Security\LoginFormAuthenticator;
use App\Entity\User;
use App\Traits\NotificationTrait;

class AuthController extends AbstractController
{

    use NotificationTrait;
    #[Route('/api/login', name: 'api_login')]
    public function async2LoginTest(Request $request)
    {
        $jsonResponse = [];
        $currentUser = $this->getUser();

        if ($currentUser === null) {
            $this->addNotificationToResponse(
                response: $jsonResponse,
                message: "Niepoprawne hasło lub podany użytkownik nie istnieje!",
                title: "Błąd!",
            );

            return $this->json($jsonResponse);
        }

        $this->addNotificationToResponse(
            response: $jsonResponse,
            message: "Witaj {$currentUser->getUserIdentifier()}! Zalogowano pomyślnie!",
            title: "Zalogowano!",
            variant: "success",
        );

        return $this->json($jsonResponse);
    }

    #[Route('/login_async', name: 'login_async', methods: ['POST'])]
    public function asyncLogin(
        AuthenticationUtils $authenticationUtils,
        LoginFormAuthenticator $loginFormAuthenticator,
        Request $request): Response
    {

        $loginFormAuthenticator->asyncAuthenticate($request);

        if ($this->getUser()) {

            $jsonResponse = [
                'is_user_exists' => 1,
                'is_logged_in' => 1,
                'redirect_url' => '/',
            ];

            $this->addNotificationToResponse(
                response: $jsonResponse,
                message: "DZIALA ASYNC!",
                title: "Testowy title",
                variant: "success",
            );

            return
                $this->json($jsonResponse);
        }

        return
            $this->json(['dupa'=>1234]);


        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/login_auth", name="app_login")
     */
    public function login(
        AuthenticationUtils $authenticationUtils,
        LoginFormAuthenticator $loginFormAuthenticator,
        Request $request
    ): Response
    {
        $loginFormAuthenticator->authenticate($request);

         if ($this->getUser()) {
             return $this->redirectToRoute('login');
         }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();


        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout(): Response
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
