<?php
  session_start();
  echo $_SERVER["HTTP_HOST"];
  require_once("Util/Redirect.php");
  $redir = new Redirect();
  echo $redir->getURL("/func.php");
?>
