<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    require_once 'database/conexao.php';
    require_once 'config.php';

    $db = conn();

    $nome = isset($_POST['nome']) && !empty($_POST['nome']) ? $_POST['nome'] : null;
    $mensagem = isset($_POST['mensagem']) && !empty($_POST['mensagem']) ? $_POST['mensagem'] : null;

    $query = "SELECT * FROM chat.chat";

    $stmt = $db->prepare($query);

    $stmt->execute();

    foreach ($res->fetch_all() as $key) {
        echo "<h3>" . $key['nome'] . "</h3>";
        echo "<h5>" . $key['mensagem'] . "</h5>";
    }
} else {
    die();
    header('Location: index.php');
}
