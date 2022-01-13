<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AttempController extends AbstractController
{
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

        var_dump($request->getContent());
        var_dump($request->query->all());
        var_dump($request->request->all());
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

        return $this->json($navbar);
    }
}
