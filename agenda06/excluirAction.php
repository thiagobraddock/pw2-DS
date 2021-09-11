<?php
require_once('helpers.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pw2";
$conexao = new mysqli($servername, $username, $password, $dbname);

if ($conexao->connect_error) {
  die("Connection failed: " . $conexao->connect_error);
}

$id = is_numeric($_POST['txtID']) ? $_POST['txtID'] : 0;
$sql = "DELETE FROM amigo WHERE idamigo = {$id}";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fontawesome/4.7.0/css/font-awesome.min.css">
  <title>Exclusão - MYSQLI</title>
</head>

<body>
  <div class="w3-padding w3-content w3-text-grey w3-third w3-displaymiddle" id="eProfissional">
    <?php

    if ($conexao->query($sql) === TRUE) {
      alert('Amigo deletado da sua vida para sempre', 'red');
    } else {
      alert('Erro ao excluir o registro', 'red');
    }
    $conexao->close();
    ?>
  </div>