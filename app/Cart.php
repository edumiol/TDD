<?php

namespace App;

use App\services\ServiceCart;

class Cart extends User
{
    private array $products;
    private array $item;

    public function __construct(string $name, string $cep)
    {
        parent::__construct($name, $cep);
        $this->item = [];
        $this->products = [];
    }

    public function sumProducts(Cart $cart): float
    {
        $service = new ServiceCart($cart);
        return $service->sum();
    }

    /**
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    public function addProduct(Product $product, int $item): void
    {
        $this->products[] = $product;
        if(empty($this->item[$this->treatName($product)])) {
            $this->item = [$this->treatName($product) => $item];
        } else {
            $this->item[$this->treatName($product)] += $item;
        }
    }

    public function treatName(Product $product): string|array
    {
        return str_replace(" ", "_", strtolower($product->getName()));
    }

    public function getItems(): array
    {
        return $this->item;
    }

    public function getItem(mixed $item, mixed $product): mixed
    {
        return $item[str_replace(" ", "_", strtolower($product->getName()))];
    }
}