<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);
$email = filter_var($input['email'] ?? '', FILTER_VALIDATE_EMAIL);

if (!$email) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid email']);
    exit;
}

// Arquivo para salvar emails
$file = '../data/subscribers.txt';
$dir = dirname($file);

// Criar diretório se não existir
if (!is_dir($dir)) {
    mkdir($dir, 0755, true);
}

// Verificar se email já existe
if (file_exists($file)) {
    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($lines) {
        foreach ($lines as $line) {
            $parts = explode('|', trim($line));
            if ($parts[0] === $email) {
                echo json_encode(['message' => 'Email already subscribed']);
                exit;
            }
        }
    }
}

// Salvar email com timestamp e IP
$timestamp = date('Y-m-d H:i:s');
$ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
$line = $email . '|' . $timestamp . '|' . $ip . PHP_EOL;

if (file_put_contents($file, $line, FILE_APPEND | LOCK_EX)) {
    echo json_encode(['message' => 'Successfully subscribed']);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to save email']);
}
?>