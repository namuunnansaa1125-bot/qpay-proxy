<?php
header('Content-Type: application/json');

$path = $_GET['path'] ?? '';
$body = file_get_contents('php://input');

$ch = curl_init("https://merchant-sandbox.qpay.mn/v2/" . $path);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST  => $_SERVER['REQUEST_METHOD'],
    CURLOPT_HTTPHEADER     => [
        'Content-Type: application/json'
    ],
    CURLOPT_POSTFIELDS     => $body,
    CURLOPT_TIMEOUT        => 30,
]);

$response = curl_exec($ch);

if ($response === false) {
    echo json_encode(['error' => curl_error($ch)]);
} else {
    echo $response;
}
curl_close($ch);
