<?php
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $soma = (int) $_POST['txtVal1'] + (int) $_POST['txtVal2'];
    $val1 = $_POST['txtVal1'];
    $val2 = $_POST['txtVal2'];
  }
  echo $soma;
?>
