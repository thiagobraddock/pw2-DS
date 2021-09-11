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

if(isset($_POST['btnAtualizar']))
{
  extract($_POST);
  $sql = "UPDATE amigo SET 
                nome = '{$txtNome}', 
                apelido = '{$txtApelido}', 
                email = '{$txtEmail}' 
          WHERE idamigo = {$txtID}";
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Atualização - MYSQLI</title>
</head>

<body>
  <div class="w3-padding w3-content w3-text-grey w3-third w3-display-middle">
    <?php

    if ($conexao->query($sql) === FALSE) {
      alert('Erro ao atualizar', 'red');
      exit;
    } 

    alert('Registro Atualizado com Sucesso', 'purple');

    $conexao->close();
    ?>
  </div>
</body>
</html>