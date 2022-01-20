<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class MaterialController extends AbstractController
{
    #[Route('/panel/addNewMaterial', name: 'panel_add_new_material', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('panel/add_new_material.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/panel/createNewMaterial', name: 'panel_create_new_material', methods: ['POST'])]
    public function createNewMaterial(): Response
    {
        return $this->render('panel/add_new_material.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }


    #[Route('/panel/editMaterial/1', name: 'panel_edit_material', methods: ['GET'])]
    public function editMaterial(): Response
    {
        return $this->render('panel/add_new_material.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/panel/editMaterial/1', name: 'panel_update_material_details', methods: ['POST'])]
    public function updateMaterialDetails(): Response
    {
        return $this->render('panel/add_new_material.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}