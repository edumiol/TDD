<?php

namespace App;

use App\services\ServiceCart;
use App\Utils\TraitWords;

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
        $traitWords = new TraitWords();
        $this->products[] = $product;
        $itemName = $traitWords->postSlug($this->treatName($product));
        if(empty($this->item[$itemName])) {
            $this->item[] = [$itemName => $item];
        } else {
            $this->item[$itemName] += $item;
        }
    }

    public function treatName(Product $product): string|array
    {
        $traitWords = new TraitWords();
        $productName = $traitWords->postSlug($product->getName());
        return strtolower($productName);
    }

    public function getItems(): array
    {
        return $this->item;
    }

    public function getItem(mixed $items, mixed $product): mixed
    {
        $productName = $this->treatName($product);
        $quantity = 0;
        foreach ($items as $item) {
            if(isset($item[$productName])) {
                $quantity += $item[$productName];
            }
        }
        return $quantity;
    }

    public function removeProduct(Product $product, int $quantity): void
    {
        $traitWords = new TraitWords();
        $productName = $traitWords->postSlug($product->getName());
        foreach ($this->getItems() as $idx => $item) {
            if(isset($item[$productName])) {
                $this->item[$idx][$productName] = $item[$productName] - $quantity;
            }
        }
    }
}