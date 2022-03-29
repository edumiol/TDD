<?php

namespace App;

class User
{
    private string $name;
    private string $zipCode;

    public function __construct(string $name, string $zipCode)
    {
        $this->name = $name;
        $this->zipCode = $zipCode;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getZipCode(): string
    {
        return  $this->zipCode;
    }
}
