<?php
require_once 'functions.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title : 'Moodle Chat'; ?></title>
    <link rel="stylesheet" href="<?php echo getBaseUrl(); ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo getBaseUrl(); ?>assets/css/chat.css">
    <script src="<?php echo getBaseUrl(); ?>assets/js/main.js" defer></script>
    <script src="<?php echo getBaseUrl(); ?>assets/js/chat.js" defer></script>
</head>
<body>
    <header>
        <div class="header-container">
            <div class="logo">
                <img src="<?php echo getBaseUrl(); ?>assets/images/logo1.png" alt="Logo">
                <h1>Moodle Chat</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="<?php echo getBaseUrl(); ?>">Início</a></li>
                    <li><a href="<?php echo getBaseUrl(); ?>pages/acessar-moodle.php">Acessar Moodle</a></li>
                    <li><a href="<?php echo getBaseUrl(); ?>pages/suporte-tecnico.php">Suporte</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="main-content">