<?php
header('Content-Type: application/json');
require_once "../models/category.model.php";

$category = new Category();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET['act']) {
    case 'getAll':
        $data = $category->obtainAll();
        echo json_encode($data);
        break;
    case 'getOne':
        $category->setId($_GET['id']);
        $data = $category->obtainOne();
        echo json_encode($data);
        break;
    case 'post':
        if (isset($_POST['name']) && !empty($_POST['name'])) {
            $category->setName($_POST['name']);
            $category->setCreatedAt(date('Y-m-d'));
            $category->insertOne();
            $response = ['success' => true];
        } else {
            $response = ['error' => true, 'message' => 'Se deben rellenar todos los campos'];
        }
        echo json_encode($response);
        break;
    case 'update':
        if (isset($_POST["name" . $_GET['id']]) && !empty($_POST["name" . $_GET['id']])) {
            $category->setName($_POST["name" . $_GET['id']]);
            $category->setUpdatedAt(date('Y-m-d'));
            $category->setId($_GET['id']);
            $category->update();
            $response = ['success' => true];
        } else {
            $response = ['error' => true, 'message' => 'Se deben rellenar todos los campos'];
        }
        echo json_encode($response);
        break;
    case 'delete':
        $category->setId($_GET['id']);
        $category->delete();
        $response = ['success' => true];
        echo json_encode($response);
        break;
}

?>