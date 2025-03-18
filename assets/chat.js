document.addEventListener('DOMContentLoaded', function() {
    const chatButton = document.getElementById('chat-button');
    const chatWidget = document.getElementById('chat-widget');
    const chatCloseButton = document.getElementById('chat-close');
    const chatMinimizeButton = document.getElementById('chat-minimize');
    const chatMessages = document.getElementById('chat-messages');
    const chatInput = document.getElementById('chat-message-input');
    const chatSend = document.getElementById('chat-send');

    chatButton.addEventListener('click', function() {
        chatWidget.classList.toggle('open');
    });

    chatCloseButton.addEventListener('click', function() {
        chatWidget.classList.remove('open');
    });

    chatMinimizeButton.addEventListener('click', function() {
        chatWidget.classList.toggle('minimized');
    });

    // Função para adicionar mensagem
    function addMessage(text, isSent = false) {
        const messageDiv = document.createElement('div');
        messageDiv.classList.add('message');
        messageDiv.classList.add(isSent ? 'sent' : 'received');
        
        const now = new Date();
        const hours = now.getHours().toString().padStart(2, '0');
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const timeString = `${hours}:${minutes}`;
        
        messageDiv.innerHTML = `
            <div class="message-content">
                <p>${text}</p>
                <span class="message-time">${timeString}</span>
            </div>
        `;
        
        chatMessages.appendChild(messageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    // Enviar mensagem
    chatSend.addEventListener('click', function() {
        const message = chatInput.value.trim();
        if (message) {
            addMessage(message, true);
            chatInput.value = '';
            
            // Simular resposta do chatbot
            setTimeout(() => {
                addMessage("Resposta automática do chatbot.");
            }, 1000);
        }
    });

    chatInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            chatSend.click();
        }
    });
});