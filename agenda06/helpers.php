<?php

function alert($texto, $cor)
{
  $msg = <<<MSG
  <a href="listar.php">
    <h1 class="w3-button w3-{$cor}">{$texto}</h1>
  </a>
MSG;
  echo $msg;
}