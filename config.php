<?php
// Configurações de timezone
date_default_timezone_set('America/Sao_Paulo');

// Configurações de exibição de erros
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

// Configurações de sessão
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_secure', isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on');
ini_set('session.cookie_samesite', 'Strict');

// Configurações de banco de dados
define('DB_HOST', 'localhost');
define('DB_NAME', 'moodle_chat');
define('DB_USER', 'root');
define('DB_PASS', '');

// Configurações do sistema
define('SITE_NAME', 'Moodle Chat');
define('SITE_URL', '');
define('ADMIN_EMAIL', 'admin@example.com');

// Configurações do chat
define('CHAT_TIMEOUT', 300); // 5 minutos
define('CHAT_HISTORY', 100); // Número máximo de mensagens armazenadas

// Configurações de segurança
define('SALT', 'moodle_chat_salt'); // Altere para uma string aleatória
?>