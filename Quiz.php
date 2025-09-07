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
</head>
<body>
    <h1>Pontuação</h1>
    <section id="secao_form">
        <form action="CalculoPontuação.php" method="post">
            <h3><?php echo $perguntaAtual['pergunta']; ?></h3>
            <?php foreach ($perguntaAtual['opcoes'] as $i => $opcao): ?>
                <input type="radio" name="opcao" value="<?php echo $i; ?>" required> <?php echo $opcao; ?><br>
            <?php endforeach; ?>
            <input type="hidden" name="indice" value="<?php echo $indice; ?>">
            <button type="submit">Responder</button>
        </form>
    </section>
</body>
</html>