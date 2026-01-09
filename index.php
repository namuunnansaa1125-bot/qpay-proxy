<?php
header('Content-Type: application/json');

$allHeaders = function_exists('getallheaders') ? getallheaders() : [];

echo json_encode([
    'method' => $_SERVER['REQUEST_METHOD'],
    'path'   => $_GET['path'] ?? null,
    'headers_received' => $allHeaders,
    'raw_body' => file_get_contents('php://input')
], JSON_PRETTY_PRINT);
exit;
