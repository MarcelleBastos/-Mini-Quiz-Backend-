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
        <?php if (isset($_SESSION['feedback'])): ?>
            <?php
                $classeFeedback = '';
                if ($_SESSION['feedback'] === 'Correta!') {
                    $classeFeedback = 'feedback-msg feedback-correta';
                } else {
                    $classeFeedback = 'feedback-msg feedback-incorreta';
                }
            ?>
            <div class="<?php echo $classeFeedback; ?>"><?php echo $_SESSION['feedback']; unset($_SESSION['feedback']); ?></div>
        <?php endif; ?>
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