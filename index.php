<?php
session_start();
session_destroy(); // Limpa sessão ao entrar na página inicial
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Quiz Backend</title>
</head>
<body>
    <main>
        <h1>Boas Vindas ao Mini Quiz!</h1>
        <p>Teste seus conhecimentos com esse Quiz simples em PHP!<p>
            <a href="perguntas.php?question=0" class="btn">Iniciar Quiz</a>
</body>
</html>