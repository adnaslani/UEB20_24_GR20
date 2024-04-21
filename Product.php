<?php
class Product {
    protected $name;
    protected $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public function calculateFinalPrice() {
        return $this->price; // Return base price for a product
    }
}
?>