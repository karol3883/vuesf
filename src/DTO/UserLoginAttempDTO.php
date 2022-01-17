<?php

namespace App\DTO;

//class UserLoginAttempDTO
class UserLoginAttempDTO extends FormDTO
{

    private string $login;
    private string $password;

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setLogin(string $login)
    {
        $this->login = $login;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }
}