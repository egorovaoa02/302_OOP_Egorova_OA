<?php

namespace App;

class MaxPriceFilter implements ProductFilteringStrategy
{
    // ===================================
    //@TODO Реализовать стратегию фильтрации по цене товара
    // ===================================

    private $maxPrice;

    public function __construct(float $maxPrice)
    {
        $this->maxPrice = $maxPrice;
    }

    public function filter(Product $product): bool
    {
        return ($product->sellingPrice ?? $product->listPrice) <= $this->maxPrice;
    }
}
