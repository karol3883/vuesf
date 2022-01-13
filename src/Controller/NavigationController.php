<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NavigationController extends AbstractController
{
    #[Route('/getNavbarElements', name: 'generate_navigation')]
    public function index(): Response
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

        return $this->json($navbar);
//        return $this->render('home/index.html.twig', [
//            'controller_name' => 'HomeController',
//        ]);

    }
}
