<?php

namespace App\Services;
use App\DTO\UserLoginAttempDTO;

class UserAttepService
{

    public function __construct(private ?UserLoginAttempDTO $userDTO)
    {

    }

    public function isUserExists()
    {
        return (bool) rand(0,1);
    }

    public function checkUserCreddentials()
    {

        if (!$this->userDTO) {
            throw new \Exception("Wystąpił błąd!");
        }

        $login = 'karol';
        $password = 'karol1';

        if ($login === $this->userDTO->getLogin() && $password === $this->userDTO->getPassword()) {
            return;
        }

        throw new \Exception("Nieporawne dane logowania!");
    }

}