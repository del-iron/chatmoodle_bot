<?php
require_once 'functions.php';
?>
</div>
    <footer>
        <div class="footer-container">
            <div class="footer-info">
                <p>&copy; <?php echo date('Y'); ?> Moodle Chat. Todos os direitos reservados.</p>
            </div>
            <div class="footer-links">
                <ul>
                    <li><a href="<?php echo getBaseUrl(); ?>pages/suporte-tecnico.php">Suporte</a></li>
                    <li><a href="#" onclick="openTerms()">Termos de Uso</a></li>
                    <li><a href="#" onclick="openPrivacy()">Política de Privacidade</a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>
</html>