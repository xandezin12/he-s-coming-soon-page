<?php
echo "PHP está funcionando!<br>";
echo "Diretório atual: " . __DIR__ . "<br>";

$file = 'data/subscribers.txt';
$dir = dirname($file);

echo "Diretório data: " . $dir . "<br>";
echo "Arquivo: " . $file . "<br>";

if (!is_dir($dir)) {
    if (mkdir($dir, 0755, true)) {
        echo "Diretório criado com sucesso<br>";
    } else {
        echo "ERRO: Não foi possível criar diretório<br>";
    }
} else {
    echo "Diretório já existe<br>";
}

if (!file_exists($file)) {
    if (file_put_contents($file, "test@example.com|2024-01-01 12:00:00|127.0.0.1\n")) {
        echo "Arquivo de teste criado<br>";
    } else {
        echo "ERRO: Não foi possível criar arquivo<br>";
    }
} else {
    echo "Arquivo já existe<br>";
}

if (file_exists($file)) {
    $content = file_get_contents($file);
    echo "Conteúdo do arquivo:<br><pre>" . htmlspecialchars($content) . "</pre>";
}
?>