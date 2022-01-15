<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\RequestDataService;
use App\Services\UserAttepService;

use App\DTO\UserLoginAttempDTO;

use App\Traits\NotificationTrait;

class AttempController extends Controller
{
    use NotificationTrait;

    #[Route('/login', name: 'login', methods: ['GET'])]
    public function login(): Response
    {
        $navbar = [
            'home' => [
                'name' => 'Strona główna',
                'url' => 'test_url',
            ],

            'add_material' => [
                'name' => 'Dodaj materiał',
                'url' => 'test_url',
            ],

            'edit_material' => [
                'name' => 'Edytuj materiał',
                'url' => 'test_url',
            ]
        ];

        return $this->render('attemp/login.html.twig', []);
    }

    #[Route('/login', name: 'login_attemp', methods: ['POST'])]
    public function loginAttemp(Request $request): Response
    {
        $userDataDTO = RequestDataService::getRequestData($request, UserLoginAttempDTO::class);
        $userAttemp = new UserAttepService($userDataDTO);

        $message = "Poprawne dane logowania";
        $jsonResponse = [];
        $jsonResponse = [
            'is_user_exists' => $userAttemp->isUserExists(),
            'is_logged_in' => $userAttemp->isUserExists(),
            'redirect_url' => '/',
        ];
        $this->addNotificationToResponse(
            response: $jsonResponse,
            message: $message,
            title: "Testowy title",
            variant: "success",
        );

        try {
            $userAttemp->checkUserCreddentials();
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
        }

        return
            $this->json($jsonResponse);
    }
}
