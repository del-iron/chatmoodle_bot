<?php
// Iniciar sessão
session_start();

// Incluir arquivos necessários
include 'config.php';
include 'includes/db_connect.php';
include 'includes/functions.php';

// Título da página
$page_title = "Moodle Chat";

// Incluir o cabeçalho
include 'includes/header.php';
?>

<div class="container">
    <div class="welcome-section">
        <h1>Bem-vindo ao Assistente Virtual do Moodle</h1>
        <p>Selecione uma opção abaixo ou use o chat para tirar suas dúvidas.</p>
    </div>
    
    <div class="options-grid">
        <a href="pages/acessar-moodle.php" class="option-card">
            <div class="option-icon">📚</div>
            <h3>1. Acessar o Moodle</h3>
            <p>Entre na plataforma Moodle</p>
        </a>
        
        <a href="pages/esqueci-senha.php" class="option-card">
            <div class="option-icon">🔑</div>
            <h3>2. Esqueci minha senha</h3>
            <p>Recupere seu acesso à plataforma</p>
        </a>
        
        <a href="pages/minhas-notas.php" class="option-card">
            <div class="option-icon">📊</div>
            <h3>3. Ver minhas notas</h3>
            <p>Consulte seu desempenho acadêmico</p>
        </a>
        
        <a href="pages/prazos-atividades.php" class="option-card">
            <div class="option-icon">📅</div>
            <h3>4. Prazos de atividades</h3>
            <p>Veja os prazos de entrega pendentes</p>
        </a>
        
        <a href="pages/suporte-tecnico.php" class="option-card">
            <div class="option-icon">🛠️</div>
            <h3>5. Suporte técnico</h3>
            <p>Obtenha ajuda com problemas técnicos</p>
        </a>
        
        <a href="pages/falar-humano.php" class="option-card">
            <div class="option-icon">👨‍💼</div>
            <h3>6. Falar com um humano</h3>
            <p>Contate um atendente real</p>
        </a>
        
        <a href="#" class="option-card" onclick="openFAQ()">
            <div class="option-icon">❓</div>
            <h3>7. Perguntas frequentes</h3>
            <p>Dúvidas comuns sobre o Moodle</p>
        </a>
        
        <a href="#" class="option-card" onclick="openTutorials()">
            <div class="option-icon">📝</div>
            <h3>8. Tutoriais</h3>
            <p>Aprenda a usar o Moodle</p>
        </a>
        
        <a href="#" class="option-card" onclick="openCourses()">
            <div class="option-icon">🎓</div>
            <h3>9. Meus cursos</h3>
            <p>Acesse seus cursos atuais</p>
        </a>
        
        <a href="#" class="option-card" onclick="openCalendar()">
            <div class="option-icon">📆</div>
            <h3>10. Calendário</h3>
            <p>Veja seu calendário acadêmico</p>
        </a>
    </div>
</div>

<?php
// Incluir o botão de chat
include 'chat/chat-widget.php';

// Incluir o rodapé
include 'includes/footer.php';
?>