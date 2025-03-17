<?php
// Função para obter mensagens do banco de dados
function getChatMessages($pdo) {
    $stmt = $pdo->prepare("SELECT * FROM chat_messages ORDER BY created_at ASC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Conectar ao banco de dados
require_once '../includes/db_connect.php';

// Obter mensagens
$messages = getChatMessages($pdo);
?>

<div class="chat-messages" id="chat-messages">
    <?php foreach ($messages as $message): ?>
        <div class="message <?php echo $message['sender'] == 'user' ? 'sent' : 'received'; ?>">
            <div class="message-content">
                <p><?php echo htmlspecialchars($message['content']); ?></p>
                <span class="message-time"><?php echo date('H:i', strtotime($message['created_at'])); ?></span>
            </div>
        </div>
    <?php endforeach; ?>
</div>