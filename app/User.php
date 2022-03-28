<?php

namespace App;

class User
{
    private string $name;
    private string $cep;

    public function __construct(string $name, string $cep)
    {
        $this->name = $name;
        $this->cep = $cep;
    }
}