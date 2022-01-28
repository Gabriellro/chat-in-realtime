<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once 'database/conexao.php';
    require_once 'config.php';

    $db = conn();

    $nome = isset($_POST['nome']) && !empty($_POST['nome']) ? $_POST['nome'] : null;
    $mensagem = isset($_POST['mensagem']) && !empty($_POST['mensagem']) ? $_POST['mensagem'] : null;

    $query = "INSERT INTO chat.chat (nome, mensagem) VALUES (? ,?)";

    $stmt = $db->prepare($query);
    $stmt->bind_param("ss", $nome, $mensagem);
    $stmt->execute();

    header('Location: index.php');
    die();
} else {
    die();
    header('Location: index.php');
}
