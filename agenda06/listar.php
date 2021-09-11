<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "pw2";
  $conexao = new mysqli($servername, $username, $password, $dbname);
  if ($conexao->connect_error) {
    die("Connection failed: " . $conexao->connect_error);
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
  <title>Listagem de Amigos - MYSQLI</title>
</head>

<body>
  <a href="index.php" class="w3-display-topleft">
    <i class="fa fa-arrow-circle-left w3-large w3-teal w3-button w3-xxlarge"></i>
  </a>
  <!-- header da tabela -->
  <?php
  $tableHead = <<<TABLE
  <div class="w3-paddingw3-content w3-half w3-display-topmiddle w3-margin">
  <h1 class="w3-center w3-teal w3-round-large">Listagem de Amigos</h1>
  <table class="w3-table-all w3-centered">
    <thead>
      <tr class="w3-center w3-orange">
        <th>Código</th>
        <th>Nome</th>
        <th>Apelido</th>
        <th>Email</th>
        <th>Excluir</th>
        <th>Atualizar</th>
      </tr>
    </thead>
TABLE;
  echo $tableHead;
  // query
  $sql = "SELECT * FROM amigo";
  $resultado = $conexao->query($sql);
  if ($resultado->num_rows < 1)
  {
    echo '<h2>😭 Você não tem amigos cadastrados ainda ...</h2>';
    exit;
  }
  // dados da tabela
    foreach ($resultado as $linha) {
      echo '<tr>';
      echo '<td>' . $linha['idamigo'] . '</td>';
      echo '<td>' . $linha['nome']    . '</td>';
      echo '<td>' . $linha['apelido'] . '</td>';
      echo '<td>' . $linha['email']   . '</td>';
      echo '<td><a href="excluir.php?id='    . $linha['idamigo'] . '&nome=' . $linha['nome'] . '&apelido=' . $linha['apelido'] . '&email=' . $linha['email'] . '"><i class="fa fa-user-times w3-large w3-text-red"></i> </a></td>';
      echo '<td><a href="atualizar.php?id='  . $linha['idamigo'] . '&nome=' . $linha['nome'] . '&apelido=' . $linha['apelido'] . '&email=' . $linha['email'] . '"><i class="fa fa-refresh w3-large w3-text-blue""></i></a></td></td>';
      echo '</tr>';
    }
    // fecha a tabela
  echo '
  </table>
  </div>';
  $conexao->close();
  ?>
  </div>
</body>

</html>