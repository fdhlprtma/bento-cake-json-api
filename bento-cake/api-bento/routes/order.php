<?php
require_once __DIR__ . '/../controllers/OrderController.php';

$controller = new OrderController();
$method = $_SERVER['REQUEST_METHOD'];
$path = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

if ($path === "order") {
    if ($method === "GET") {
        $controller->getOrders();
    } elseif ($method === "POST") {
        $data = json_decode(file_get_contents("php://input"), true);
        $controller->createOrder($data);
    } else {
        Response::error("Method not allowed", 405);
    }
} elseif ($path === "lokasi") {
    if ($method === "GET") {
        $controller->getLokasi();
    } else {
        Response::error("Method not allowed", 405);
    }
} else {
    Response::error("Endpoint not found", 404);
}
