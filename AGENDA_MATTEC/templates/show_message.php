<?php if (isset($printMsg) && $printMsg != '') : ?>
    <p id="msg"><?= $printMsg ?></p>
    <script>
        setTimeout(function() {
            var msgElement = document.getElementById("msg");
            if (msgElement) {
                msgElement.style.display = "none";
            }
        }, 3000); // Mensagem desaparece após 3 segundos
    </script>
<?php endif; ?>
