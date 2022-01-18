<?php

declare(strict_types=1);

namespace App\Traits;

use App\Entity\User;

trait AuthTrait
{

    private array $redirectByRole = [
        'ROLE_ADMIN' => '/admin',
        'ROLE_USER' => '/'
    ];

    private function generateRedirectKeyByRole(User $user): string
    {
        return "DUPA!";

        $userRoles = $user->getRoles();

        if (in_array('ROLE_ADMIN', $userRoles)) {
            return 'panel_admin';
        }
    }
}