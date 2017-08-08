<?php
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(empty($_POST['usrLogin']) && empty($_POST['usrPassword'])){

    }
    else{
      require_once('user.php');
      require_once('Control/LoginControl.php');
      session_start();
      $_SESSION['test'] = $_POST['usrLogin'];
      $loginControl = new LoginControl();
      $user = new User($_POST['usrLogin'], $_POST['usrPassword']);
      $validate = $loginControl->validateLogin($user);
      if($validate){
        header('Location: ' . "/Teste/func.php");
        exit();
      }
    }
  }
?>
<head>
  <link rel="stylesheet" type="text/css" href="CSS/style.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<title>Test Page PHP</title>
<body>
  <?php include("header.php"); ?>
  <div id="content">

  </div>
</body>
