<?php
session_start();
include 'perguntas.php';

$indice = $_SESSION['indice'] ?? 0;
$perguntaAtual = $questions[$indice];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Quiz - Avaliação</title>
    <link rel="stylesheet" href="quiz.css">
</head>
<body>
    <main class="container">
        <h1>Perguntas</h1>
        <section id="secao_form">
            <form action="CalculoPontuação.php" method="post">
                <h3><?php echo $perguntaAtual['pergunta']; ?></h3>
                <?php foreach ($perguntaAtual['opcoes'] as $i => $opcao): ?>
                    <input type="radio" name="option" value="<?php echo $i; ?>" required> <?php echo $opcao; ?><br>
                <?php endforeach; ?>
                <input type="hidden" name="currentQuestion" value="<?php echo $indice; ?>">
                <button type="submit">Responder</button>
            </form>
        </section>
    </main>
</body>
</html>