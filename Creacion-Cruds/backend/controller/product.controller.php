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
        if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['category']) && !empty($_POST['category']) && isset($_POST['price']) && !empty($_POST['price'])) {
            $product->setName($_POST['name']);
            $product->setCategory($_POST['category']);
            $product->setPrice($_POST['price']);
            $product->setCreatedAt(date('Y-m-d'));
            $product->insertOne();
            $response = ['success' => true];
        } else {
            $response = ['error' => true, 'message' => 'Se deben rellenar todos los campos'];
        }
        echo json_encode($response);
        break;
    case 'update':
        if (isset($_POST["name" . $_GET['id']]) && !empty($_POST["name" . $_GET['id']]) && isset($_POST['category']) && !empty($_POST['category']) && isset($_POST['price']) && !empty($_POST['price'])) {
            $product->setName($_POST["name" . $_GET['id']]);
            $product->setCategory($_POST['category']);
            $product->setPrice($_POST['price']);
            $product->setUpdatedAt(date('Y-m-d'));
            $product->setId($_GET['id']);
            $product->update();
            $response = ['success' => true];
        } else {
            $response = ['error' => true, 'message' => 'Se deben rellenar todos los campos'];
        }
        echo json_encode($response);
        break;
    case 'delete':
        $product->setId($_GET['id']);
        $product->delete();
        $response = ['success' => true];
        echo json_encode($response);
        break;
}

?>