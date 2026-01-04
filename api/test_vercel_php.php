<?php
// CORS заголовки для работы с JavaScript
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

// Обработка preflight запроса
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Получаем данные от JavaScript
$input = json_decode(file_get_contents('php://input'), true);
$clientMessage = $input['message'] ?? 'No message';

// Формируем ответ
$response = [
    'success' => true,
    'message' => 'PHP успешно обработал запрос! Получено: ' . $clientMessage,
    'timestamp' => date('Y-m-d H:i:s'),
    'php_version' => phpversion(),
    'server_info' => [
        'method' => $_SERVER['REQUEST_METHOD'],
        'host' => $_SERVER['HTTP_HOST'] ?? 'unknown'
    ]
];

// Отправляем JSON ответ
echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>