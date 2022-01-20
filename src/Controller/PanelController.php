<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PanelController extends AbstractController
{
    #[Route('/panel', name: 'panel', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('panel/add_new_material.html.twig', []);
    }
}