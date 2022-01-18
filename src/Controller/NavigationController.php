<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class NavigationController extends AbstractController
{
    public function __construct(private UrlGeneratorInterface $urlGenerator)
    {
    }

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
                'url' => $this->urlGenerator->generate('panel_add_new_material'),
            ],

            'edit_material' => [
                'name' => 'Edytuj materiał',
                'url' => $this->urlGenerator->generate('panel_edit_material'),
            ]
        ];

        return $this->json($navbar);
    }
}
