<?php
header('Content-Type: application/json');

$file = '../data/subscribers.txt';

if (!file_exists($file)) {
    echo json_encode(['error' => 'Arquivo não existe', 'file' => $file]);
    exit;
}

$content = file_get_contents($file);
$lines = explode("\n", trim($content));
$subscribers = [];

foreach ($lines as $line) {
    if (trim($line)) {
        $parts = explode('|', $line);
        $subscribers[] = [
            'email' => $parts[0],
            'date' => $parts[1] ?? 'Unknown'
        ];
    }
}

echo json_encode([
    'total' => count($subscribers),
    'subscribers' => $subscribers
]);
?>