<?php
header('Content-Type: application/json');
require_once "../models/product.model.php";

$product = new Products();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET['act']) {
    case 'getAll':
        $data = $product->obtainAll();
        echo json_encode($data);
        break;
    case 'getOne':
        $product->setId($_GET['id']);
        $data = $product->obtainOne();
        echo json_encode($data);
        break;
    case 'post':
        # code...
        break;
    case 'update':
        # code...
        break;
    case 'delete':
        # code...
        break;
}

?>