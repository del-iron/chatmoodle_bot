document.addEventListener('DOMContentLoaded', function() {
    const chatButton = document.getElementById('chat-button');
    const chatWidget = document.getElementById('chat-widget');
    const chatCloseButton = document.getElementById('chat-close');
    const chatMinimizeButton = document.getElementById('chat-minimize');
    const chatMessages = document.getElementById('chat-messages');
    const chatInput = document.getElementById('chat-message-input');
    const chatSend = document.getElementById('chat-send');
    const chatOptions = document.querySelectorAll('.option-button');

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
    function sendMessage() {
        const message = chatInput.value.trim();
        if (message) {
            addMessage(message, true);
            chatInput.value = '';
            
            // Simular resposta do chatbot
            processMessage(message);
        }
    }

    chatSend.addEventListener('click', sendMessage);

    chatInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            sendMessage();
        }
    });

    // Processar opções de chat
    chatOptions.forEach(option => {
        option.addEventListener('click', function() {
            const optionText = this.textContent;
            addMessage(optionText, true);
            processOption(this.dataset.option);
        });
    });

    // Processar mensagem do usuário
    function processMessage(message) {
        setTimeout(() => {
            // Simular digitação
            const typingDiv = document.createElement('div');
            typingDiv.classList.add('message', 'received');
            typingDiv.innerHTML = `
                <div class="message-content">
                    <p>Digitando...</p>
                </div>
            `;
            chatMessages.appendChild(typingDiv);
            chatMessages.scrollTop = chatMessages.scrollHeight;
            
            setTimeout(() => {
                chatMessages.removeChild(typingDiv);
                
                // Encontrar resposta apropriada
                let response = "Não entendi sua dúvida. Pode tentar novamente ou escolher uma das opções abaixo?";
                
                // Palavras-chave simplificadas
                if (message.toLowerCase().includes('senha') || message.toLowerCase().includes('esqueci')) {
                    response = "Para recuperar sua senha, acesse a página de login do Moodle e clique em 'Esqueceu seu usuário ou senha?'. Você receberá instruções por email.";
                } else if (message.toLowerCase().includes('nota') || message.toLowerCase().includes('avaliação')) {
                    response = "Para ver suas notas, acesse o Moodle, entre no curso desejado e procure pelo bloco 'Administração' ou 'Notas'.";
                } else if (message.toLowerCase().includes('prazo') || message.toLowerCase().includes('atividade') || message.toLowerCase().includes('entrega')) {
                    response = "Os prazos de atividades podem ser vistos no calendário do Moodle ou na página do curso, na seção 'Próximos eventos'.";
                } else if (message.toLowerCase().includes('humano') || message.toLowerCase().includes('professor') || message.toLowerCase().includes('suporte')) {
                    response = "Estou transferindo você para um atendente humano. Por favor, aguarde um momento.";
                }
                
                addMessage(response);
            }, 1500);
        }, 500);
    }

    // Processar opção selecionada
    function processOption(option) {
        let response = "";
        
        switch(option) {
            case "1":
                response = "Para acessar o Moodle, entre no site oficial da instituição e use suas credenciais de acesso. Se preferir, posso direcionar você para a página de login.";
                break;
            case "2":
                response = "Para recuperar sua senha, acesse a página de login do Moodle e clique em 'Esqueceu seu usuário ou senha?'. Você receberá instruções por email.";
                break;
            case "3":
                response = "Para ver suas notas, acesse o Moodle, entre no curso desejado e procure pelo bloco 'Administração' ou 'Notas'.";
                break;
            case "4":
                response = "Os prazos de atividades podem ser vistos no calendário do Moodle ou na página do curso, na seção 'Próximos eventos'.";
                break;
            case "5":
                response = "Para suporte técnico, envie um email para suporte@instituicao.edu ou ligue para (XX) XXXX-XXXX em horário comercial.";
                break;
            case "6":
                response = "Estou transferindo você para um atendente humano. Por favor, aguarde um momento.";
                break;
            case "7":
                response = "Veja nossas perguntas frequentes sobre o Moodle: Como enviar trabalhos, como participar de fóruns, como acessar materiais de aula, etc.";
                break;
            case "8":
                response = "Nossos tutoriais podem te ajudar a usar o Moodle de forma mais eficiente. Posso te mostrar tutoriais sobre envio de trabalhos, participação em fóruns, acesso a materiais, etc.";
                break;
            case "9":
                response = "Para ver seus cursos, acesse o Moodle e clique no menu 'Meus cursos' ou veja a lista de cursos no Painel.";
                break;
            case "10":
                response = "O calendário do Moodle mostra todas as datas importantes, incluindo prazos de atividades e eventos do curso.";
                break;
            default:
                response = "Desculpe, não entendi sua escolha. Por favor, selecione uma das opções disponíveis.";
        }
        
        setTimeout(() => {
            addMessage(response);
        }, 1000);
    }
});