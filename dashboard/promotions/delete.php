<?php
include('../../classes/CRUD.php');

$crud = new CRUD;

if (isset($_GET['action']) && ($_GET['action'] === 'delete') && isset($_GET['id'])) {
    $promotion = $crud->read('promotions', ['column' => 'id', 'value' => $_GET['id']]);
    
    if ($promotion) {
        $promotion = $promotion[0];
        unlink('images/' . $promotion['image']);
        
        if ($crud->delete('promotions', ['column' => 'id', 'value' => $_GET['id']])) {
            echo 'success';
            exit;
        }
    }
}

echo 'error'; // If the deletion process fails, you can respond with an error message

