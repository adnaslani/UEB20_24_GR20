<?php
include 'Product.php';

class Furniture extends Product {
    private $material;

    public function __construct($name, $price, $material) {
        parent::__construct($name, $price);
        $this->material = $material;
    }

    public function calculateFinalPrice() {
        // Shipping fee depends on material
        if ($this->material === 'Leather') {
            return $this->price + 25; // $25 additional for leather furniture shipping
        }
        return $this->price;
    }
}
?>
