<?php
// Inclui o arquivo de funções para uso no cabeçalho
require_once 'functions.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Define o título da página, com fallback para "Moodle Chat" -->
    <title><?php echo isset($page_title) ? $page_title : 'Moodle Chat'; ?></title>
    <!-- Inclui os arquivos de estilo -->
    <link rel="stylesheet" href="<?php echo getBaseUrl(); ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo getBaseUrl(); ?>assets/css/chat.css">
    <!-- Inclui os arquivos de script -->
    <script src="<?php echo getBaseUrl(); ?>assets/js/main.js" defer></script>
    <script src="<?php echo getBaseUrl(); ?>assets/js/chat.js" defer></script>
</head>
<body>
    <header>
        <div class="header-container">
            <!-- Logo e título do site -->
            <div class="logo">
                <img src="<?php echo getBaseUrl(); ?>assets/images/logo1.png" alt="Logo">
                <h1>Moodle Chat</h1>
            </div>
            <!-- Navegação principal (removida) -->
        </div>
    </header>
    <div class="main-content">