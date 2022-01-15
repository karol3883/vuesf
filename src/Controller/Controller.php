<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
class Controller extends  AbstractController
{

    protected function getRequestData(Request $request): array
    {
        return json_decode($request->getContent(), true);
    }
}