<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

$input = json_decode(file_get_contents('php://input'), true);
$clientMessage = $input['message'] ?? 'No message';

$response = [
    'success' => true,
    'message' => 'PHP работает! Получено: ' . $clientMessage,
    'timestamp' => date('Y-m-d H:i:s'),
    'php_version' => phpversion()
];

echo json_encode($response, JSON_UNESCAPED_UNICODE);
?>