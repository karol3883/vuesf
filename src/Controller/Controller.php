<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;

use App\Traits;

class Controller extends  AbstractController
{
    use Traits\AuthTrait;

    private ?User $user;

    public function __construct(Security $security)
    {
        $this->user = $security->getUser();
        if (
            $this->user !== null &&
            $key = $this->generateRedirectKeyByRole($this->user)
        ) {

        }
    }

    protected function getRequestData(Request $request): array
    {
        return json_decode($request->getContent(), true);
    }
}