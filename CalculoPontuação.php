<?php
session_start();
include 'perguntas.php'; // array de perguntas

if (!isset($_SESSION['acertos'])) {
    $_SESSION['acertos'] = 0; // inicializa a contagem de acertos
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $QuestãoAtual = $_POST['currentQuestion'];
    $OpçãoSelecionada = $_POST['option'];

    // Verifica se a resposta está correta
    if ($OpçãoSelecionada == $questions[$QuestãoAtual]['correta']) {
        $_SESSION['acertos']++;
    }

    $QuestãoAtual++;
} 

else {
    $QuestãoAtual = isset($_GET['question']) ? (int)$_GET['question'] : 0;
}

// Verifica se o quiz terminou

if ($QuestãoAtual >= count($questions)) {
    header('Location: Resultado.php');
    exit();
}