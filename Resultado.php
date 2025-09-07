
<?php 
session_start();
$resultado = $_SESSION['acertos'];
include 'perguntas.php';
$total = count($questions);
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
    <link rel="stylesheet" href="resultado.css">
</head>
<body>
    <main class="container">
        <h1>Resultado Final: </h1>
        <h2>Você acertou <?php echo $resultado . ' / ' . $total; ?> perguntas!</h2>
        <a href="index.php" class="btn">Refazer Quiz</a>
    </main>
</body>
</html>