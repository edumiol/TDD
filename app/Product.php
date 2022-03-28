<?php

namespace App;

class Product
{
    private string $name;
    private float $value;

    public function __construct(string $name, float $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    public function getProduct(): array
    {
        return ['name' => $this->name, 'value' => $this->value];
    }



}