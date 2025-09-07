<?php 
session_start();
$resultado = $_SESSION['acertos'];
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
</head>
<body>
    <h1>Resultado Final: </h1>
    <h2>Você acertou <?php echo $resultado; ?> perguntas!</h2>
    <a href="index.php">Refazer Quiz</a>
    
</body>
</html>