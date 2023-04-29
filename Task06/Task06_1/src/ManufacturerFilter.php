<?php

namespace App;

class ManufacturerFilter implements ProductFilteringStrategy
{
    // ===================================
    //@TODO Реализовать стратегию фильтрации по производителю товара
    // ===================================

    private $manufacturer;

    public function __construct(string $manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }

    public function filter(Product $product): bool
    {
        return $product->manufacturer === $this->manufacturer;
    }
}
