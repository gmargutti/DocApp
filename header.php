<?php
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(empty($_POST['txtLogin']) || empty($_POST['txtSenha'])){

    }
    else{
      require_once('user.php');
      require_once('Control/LoginControl.php');
      $loginControl = new LoginControl();
      $user = new User($_POST['txtLogin'], $_POST['txtSenha']);
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
</head>
<body>
  <div class="menuHeader">
    <div class="loginHeader">
      <form action="" method="post">
        <input type="text" name="txtLogin" placeholder="Usuário" id="input_Borders" value="<?php isset($_POST['txtLogin']) ? $_POST['txtLogin'] : 'OK'; ?>" />
        <input type="password" name="txtSenha" placeholder="Senha" id="input_Borders" />
        <input type="submit" value="Login"/>
      </form>
    </div>
    <div class="logoHeader">
      <img src="images/logo.png" height="64px" width="64px" />
      <div class="logoText">
        <p>Texto App Legal</p>
      </div>
    </div>

  </div>
</body>
