<?php
/**
 * Obtém a URL base do projeto
 * 
 * @return string URL base
 */
function getBaseUrl() {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $scriptName = $_SERVER['SCRIPT_NAME'];
    $dirName = dirname($scriptName);
    
    // Se estiver executando na raiz do projeto
    if ($dirName == '/' || $dirName == '\\') {
        return $protocol . '://' . $host . '/';
    }
    
    // Se estiver em uma subpasta
    if (strpos($dirName, '/pages') !== false || strpos($dirName, '/chat') !== false) {
        $dirName = dirname($dirName);
    }
    
    return $protocol . '://' . $host . $dirName . '/';
}

/**
 * Redireciona para uma página específica
 * 
 * @param string $page Nome da página para redirecionar
 * @return void
 */
function redirect($page) {
    header('Location: ' . getBaseUrl() . $page);
    exit;
}

/**
 * Exibe uma mensagem de alerta
 * 
 * @param string $message Mensagem a ser exibida
 * @param string $type Tipo de mensagem (success, error, warning, info)
 * @return void
 */
function showAlert($message, $type = 'info') {
    $_SESSION['alert'] = [
        'message' => $message,
        'type' => $type
    ];
}

/**
 * Verifica se há uma mensagem de alerta para exibir
 * 
 * @return string|null HTML da mensagem ou null se não houver
 */
function getAlert() {
    if (isset($_SESSION['alert'])) {
        $alert = $_SESSION['alert'];
        unset($_SESSION['alert']);
        
        return '<div class="alert alert-' . $alert['type'] . '">' . $alert['message'] . '</div>';
    }
    
    return null;
}

/**
 * Sanitiza uma string para evitar injeção de código
 * 
 * @param string $input String a ser sanitizada
 * @return string String sanitizada
 */
function sanitizeInput($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

/**
 * Formata uma data para o formato brasileiro
 * 
 * @param string $date Data no formato Y-m-d
 * @return string Data no formato d/m/Y
 */
function formatDate($date) {
    $timestamp = strtotime($date);
    return date('d/m/Y', $timestamp);
}

/**
 * Retorna o nome do dia da semana
 * 
 * @param string $date Data no formato Y-m-d
 * @return string Nome do dia da semana
 */
function getDayOfWeek($date) {
    $timestamp = strtotime($date);
    $dayOfWeek = date('w', $timestamp);
    
    $days = [
        'Domingo',
        'Segunda-feira',
        'Terça-feira',
        'Quarta-feira',
        'Quinta-feira',
        'Sexta-feira',
        'Sábado'
    ];
    
    return $days[$dayOfWeek];
}

/**
 * Retorna o nome do mês
 * 
 * @param int $month Número do mês (1-12)
 * @return string Nome do mês
 */
function getMonthName($month) {
    $months = [
        1 => 'Janeiro',
        2 => 'Fevereiro',
        3 => 'Março',
        4 => 'Abril',
        5 => 'Maio',
        6 => 'Junho',
        7 => 'Julho',
        8 => 'Agosto',
        9 => 'Setembro',
        10 => 'Outubro',
        11 => 'Novembro',
        12 => 'Dezembro'
    ];
    
    return $months[$month];
}

/**
 * Gera um token de segurança
 * 
 * @return string Token gerado
 */
function generateToken() {
    return bin2hex(random_bytes(32));
}

/**
 * Verifica se o token é válido
 * 
 * @param string $token Token a ser verificado
 * @return bool True se o token for válido, false caso contrário
 */
function validateToken($token) {
    return isset($_SESSION['token']) && $_SESSION['token'] === $token;
}
?>