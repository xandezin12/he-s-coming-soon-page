<?php
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="subscribers_' . date('Y-m-d') . '.csv"');

$file = '../data/subscribers.txt';

if (!file_exists($file)) {
    echo "Email,Data,IP\n";
    exit;
}

$lines = file($file, FILE_IGNORE_NEW_LINES);

echo "Email,Data,IP\n";

foreach ($lines as $line) {
    if (trim($line)) {
        $parts = explode('|', $line);
        $email = $parts[0];
        $date = $parts[1] ?? 'Unknown';
        $ip = $parts[2] ?? 'Unknown';
        
        echo "\"$email\",\"$date\",\"$ip\"\n";
    }
}
?>