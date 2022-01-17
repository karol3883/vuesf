<?php

namespace App\DTO;

class FormDTO
{

    protected string $csrfToken;

    public function getCsrfToken(): string
    {
        return $this->csrfField;
    }

    public function setCsrfToken(string $csrfField): void
    {
        $this->csrfField = $csrfField;
    }

}