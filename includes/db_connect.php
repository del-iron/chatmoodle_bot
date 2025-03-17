<?php
$host = 'localhost';
$db = 'moodle_chat';
$user = 'root';
$pass = 'senha';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
}

function getConnection() {
    static $conn = null;
    
    if ($conn === null) {
        try {
            $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            
            $conn = new PDO($dsn, DB_USER, DB_PASS, $options);
        } catch (PDOException $e) {
            // Registra o erro, mas não exibe para o usuário
            error_log('Erro de conexão com o banco de dados: ' . $e->getMessage());
            die('Erro ao conectar com o banco de dados. Por favor, tente novamente mais tarde.');
        }
    }
    
    return $conn;
}

/**
 * Executa uma consulta SQL
 * 
 * @param string $sql Query SQL
 * @param array $params Parâmetros da query
 * @return PDOStatement Resultado da query
 */
function executeQuery($sql, $params = []) {
    $conn = getConnection();
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);
    
    return $stmt;
}

/**
 * Retorna um único registro
 * 
 * @param string $sql Query SQL
 * @param array $params Parâmetros da query
 * @return array|false Registro encontrado ou false
 */
function fetchOne($sql, $params = []) {
    $stmt = executeQuery($sql, $params);
    return $stmt->fetch();
}

/**
 * Retorna todos os registros
 * 
 * @param string $sql Query SQL
 * @param array $params Parâmetros da query
 * @return array Registros encontrados
 */
function fetchAll($sql, $params = []) {
    $stmt = executeQuery($sql, $params);
    return $stmt->fetchAll();
}

/**
 * Retorna o ID do último registro inserido
 * 
 * @return string ID do último registro
 */
function getLastInsertId() {
    $conn = getConnection();
    return $conn->lastInsertId();
}

/**
 * Inicia uma transação
 * 
 * @return void
 */
function beginTransaction() {
    $conn = getConnection();
    $conn->beginTransaction();
}

/**
 * Confirma uma transação
 * 
 * @return void
 */
function commitTransaction() {
    $conn = getConnection();
    $conn->commit();
}

/**
 * Cancela uma transação
 * 
 * @return void
 */
function rollbackTransaction() {
    $conn = getConnection();
    $conn->rollBack();
}
?>