<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$clientMessage = $_GET['message'] ?? 'No message';

$response = [
    'success' => true,
    'message' => 'PHP работает! Получено: ' . $clientMessage,
    'timestamp' => date('Y-m-d H:i:s'),
    'php_version' => phpversion()
];

echo json_encode($response, JSON_UNESCAPED_UNICODE);
?>