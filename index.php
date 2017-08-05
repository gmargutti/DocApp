<?php
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once('user.php');
    require_once('Control/LoginControl.php');
    $loginControl = new LoginControl();
    $user = new User($_POST['usrLogin'], $_POST['usrPassword']);
    $control = new LoginControl();
    echo $control->validateLogin($user) . '</br>';
    $user2 = new User("gmargutti", "333");
    if ($user->getLogin() == $user2->getLogin() && $user->getPw() == $user2->getPw()) {
      echo "OK";
    }
    else{
      echo "Failed to Login";
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
  <form action="index.php" method="post">
    <div id="content">
      <table>
      <tr>
        <td>
          <i class="fa fa-sign-in fa-lg" aria-hidden="true"></i>
          <p><font color="white">Login</font></p>
        </td>
      </tr>
      <tr>
        <td>
          <div id="placeHolder_Icon">
          <input type="text" name="usrLogin" value="<?php echo isset($_POST['usrLogin']) ? $_POST['usrLogin'] : ''; ?>" tabindex="1"
          placeholder="Username" id="input_Borders"/>
          <i class="fa fa-user-o" id="fa_Icon"></i>
        </div>
        </td>
        <td rowspan="2">
          <input id="btn_Login" type="submit" value="" />
        </td>
      </tr>
      <tr>
        <td>
          <div id="placeHolder_Icon">
            <input type="password" name="usrPassword" tabindex="2" placeholder="Password" id="input_Borders"/>
            <i class="fa fa-key" id="fa_Icon"></i>
          </div>
        </td>
      </tr>
    </table>
  </form>
</body>