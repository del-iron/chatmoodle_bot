document.addEventListener('DOMContentLoaded', function() {
    const chatButton = document.getElementById('chat-button');
    const chatWidget = document.getElementById('chat-widget');
    const chatCloseButton = document.getElementById('chat-close');
    const chatMinimizeButton = document.getElementById('chat-minimize');

    chatButton.addEventListener('click', function() {
        chatWidget.classList.toggle('open');
    });

    chatCloseButton.addEventListener('click', function() {
        chatWidget.classList.remove('open');
    });

    chatMinimizeButton.addEventListener('click', function() {
        chatWidget.classList.toggle('minimized');
    });
});