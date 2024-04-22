<?php
class ProductManager {
    private $crud;

    public function __construct($crud) {
        $this->crud = $crud;
    }

    public function getProducts() {
        return $this->crud->read('products');
    }
  
}
// class ElectronicsManager extends ProductManager {
//     public function getWarrantyInfo() {
//         // Kjo metodë mund të kthejë informacione rreth garancisë për produktet elektronike
//         echo "Informacione rreth garancisë për produktet elektronike.";
//     }
// }

// class FurnitureManager extends ProductManager {
//     public function getAssemblyInstructions() {
//         // Kjo metodë mund të kthejë udhëzime për montimin e mobiljeve
//         echo "Udhëzime për montimin e mobiljeve.";
//     }
// }

// // Krijojmë objekte të menaxhimit të elektronikës dhe mobiljeve
// $electronicsManager = new ElectronicsManager($crud);
// $furnitureManager = new FurnitureManager($crud);

// // Dërgojmë metodat specifike
// $electronicsManager->getWarrantyInfo();
// $furnitureManager->getAssemblyInstructions();
?>