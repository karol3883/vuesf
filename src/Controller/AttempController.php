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
        if ($this->getUser() !== null) {
            echo "Redirect na => /test";
        }

        return $this->render('attemp/login.html.twig', []);
    }
}
