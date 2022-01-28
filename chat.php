<?php

require_once 'database/conexao.php';
require_once 'config.php';

$db = conn();


$query = "SELECT * FROM chat.chat";

$stmt = $db->prepare($query);

$stmt->execute();

$resultado = $stmt->get_result();

$pegar_dados = $resultado->fetch_all(MYSQLI_ASSOC);


foreach ($pegar_dados as $key => $value) {
    echo "<h3>" . $value['nome'] . "</h3>";
    echo "<h5>" . $value['mensagem'] . "</h5>";
}
