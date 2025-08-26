<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$file = '../data/subscribers.txt';
$dir = dirname($file);

// Criar diretório se não existir
if (!is_dir($dir)) {
    mkdir($dir, 0755, true);
}

if (!file_exists($file)) {
    echo json_encode([
        'subscribers' => [], 
        'total' => 0,
        'today' => 0,
        'thisWeek' => 0,
        'thisMonth' => 0
    ]);
    exit;
}

$lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$subscribers = [];
$today = date('Y-m-d');
$weekStart = date('Y-m-d', strtotime('-7 days'));
$monthStart = date('Y-m-d', strtotime('-30 days'));

$todayCount = 0;
$weekCount = 0;
$monthCount = 0;

if ($lines) {
    foreach ($lines as $line) {
        $parts = explode('|', trim($line));
        if (count($parts) >= 2) {
            $email = $parts[0];
            $datetime = $parts[1];
            $ip = $parts[2] ?? 'Unknown';
            
            $subscribers[] = [
                'email' => $email,
                'date' => $datetime,
                'ip' => $ip
            ];
            
            // Contar estatísticas
            $dateOnly = substr($datetime, 0, 10);
            if ($dateOnly === $today) $todayCount++;
            if ($dateOnly >= $weekStart) $weekCount++;
            if ($dateOnly >= $monthStart) $monthCount++;
        }
    }
    
    // Ordenar por data mais recente primeiro
    usort($subscribers, function($a, $b) {
        return strtotime($b['date']) - strtotime($a['date']);
    });
}

echo json_encode([
    'subscribers' => $subscribers, 
    'total' => count($subscribers),
    'today' => $todayCount,
    'thisWeek' => $weekCount,
    'thisMonth' => $monthCount
]);
?>