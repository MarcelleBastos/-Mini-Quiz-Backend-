<?php
session_start();
include 'perguntas.php'; // array de perguntas

if (!isset($_SESSION['acertos'])) {
    $_SESSION['acertos'] = 0; // inicializa a contagem de acertos
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $QuestaoAtual = isset($_POST['currentQuestion']) ? (int)$_POST['currentQuestion'] : 0;
    $OpcaoSelecionada = isset($_POST['option']) ? $_POST['option'] : null;


    // Verifica se a resposta está correta
    if ($OpcaoSelecionada !== null && isset($questions[$QuestaoAtual]) && isset($questions[$QuestaoAtual]['correta'])) {
        if ($OpcaoSelecionada == $questions[$QuestaoAtual]['correta']) {
            $_SESSION['acertos']++;
            $_SESSION['feedback'] = 'Correta!';
        } else {
            $_SESSION['feedback'] = 'Incorreta!';
        }
    }

    $QuestaoAtual++;
    $_SESSION['indice'] = $QuestaoAtual;

    // Verifica se o quiz terminou
    if ($QuestaoAtual >= count($questions)) {
        header('Location: Resultado.php');
        exit();
    } else {
        header('Location: Quiz.php');
        exit();
    }
}