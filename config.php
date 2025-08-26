<?php
// Configurações do sistema
define('ADMIN_EMAIL', 'seu-email@exemplo.com'); // ALTERE PARA SEU EMAIL
define('SITE_NAME', 'The Aether Order');
define('SMTP_HOST', 'smtp.gmail.com'); // Para Gmail
define('SMTP_PORT', 587);
define('SMTP_USERNAME', 'seu-email@gmail.com'); // ALTERE
define('SMTP_PASSWORD', 'sua-senha-app'); // ALTERE para senha de app do Gmail
define('SMTP_SECURE', 'tls');

// Configurações de notificação
define('ENABLE_EMAIL_NOTIFICATIONS', true);
define('NOTIFICATION_SUBJECT', '[' . SITE_NAME . '] Novo Subscriber!');
?>