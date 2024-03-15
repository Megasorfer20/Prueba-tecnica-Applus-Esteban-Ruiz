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