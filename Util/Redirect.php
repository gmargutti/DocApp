<?php
  define("URL", "http:/" . $_SERVER['HTTP_HOST']);
  function getURL(string $res){
    return URL.$res;
  }
?>
