<?php
include 'Product.php';

class Electronics extends Product {
    private $warrantyPeriod;

    public function __construct($name, $price, $warrantyPeriod) {
        parent::__construct($name, $price);
        $this->warrantyPeriod = $warrantyPeriod;
    }

    public function calculateFinalPrice() {
        // Add additional fee for warranty
        return $this->price + 20; // $50 additional fee for warranty
    }
}
?>
