<?php
require_once __DIR__ . '/config/cors.php';
require_once __DIR__ . '/utils/Response.php';
header("Content-Type: application/json");

$request = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/");
$parts = explode("/", $request);
$endpoint = end($parts);

if (in_array($endpoint, ["order", "lokasi"])) {
    require_once __DIR__ . '/routes/order.php';
} else {
    Response::error("Endpoint not found", 404);
}