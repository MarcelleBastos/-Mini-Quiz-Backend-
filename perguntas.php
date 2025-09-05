<?php
session_start();

// Array de perguntas
$questions = [
  [
    "pergunta" => "Quantos minutos tem uma hora?",
    "opcoes" => ["30 minutos", "60 minutos", "100 minutos"],
    "correta" => 1
  ],
  [
    "pergunta" => "PHP é uma linguagem de...?",
    "opcoes" => ["Programação", "Estilo", "Marcação"],
    "correta" => 0
  ],
  [
    "pergunta" => "Qual superglobal é usada para sessões em PHP?",
    "opcoes" => ["POST", "SESSION", "COOKIE"],
    "correta" => 1
  ],
  [
    "pergunta" => "A Microsoft foi fundada em que ano?",
    "opcoes" => ["1990", "1975", "2006"],
    "correta" => 1
  ]
];

// Inicializa sessão
if (!isset($_SESSION['score'])) {
  $_SESSION['score'] = 0;
}

// Captura questão atual
$current = isset($_GET['question']) ? (int) $_GET['question'] : 0;

// Verifica resposta anterior
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $resposta = (int) $_POST['resposta'];
  $anterior = $current - 1;

  if ($resposta === $questions[$anterior]['correta']) {
    $_SESSION['score']++;
  }
}

// Se acabou o quiz
if ($current >= count($questions)) {
  echo "<h1>Quiz Finalizado!</h1>";
  echo "<p>Sua pontuação final: <strong>{$_SESSION['score']} / " . count($questions) . "</strong></p>";
  echo "<a href='index.php'>Reiniciar Quiz</a>";
  session_destroy();
  exit;
}

// Exibe questão atual
$questao = $questions[$current];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Mini Quiz Backend</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <main>
    <h2>Pergunta <?= $current + 1 ?> de <?= count($questions) ?></h2>
    <p><?= $questao['pergunta'] ?></p>
    <form method="POST" action="perguntas.php?question=<?= $current + 1 ?>">
      <?php foreach ($questao['opcoes'] as $index => $opcao): ?>
        <label>
          <input type="radio" name="resposta" value="<?= $index ?>" required>
          <?= $opcao ?>
        </label><br>
      <?php endforeach; ?>
      <button type="submit">Responder</button>
    </form>
    <p>Pontuação atual: <?= $_SESSION['score'] ?></p>
  </main>
</body>
</html>