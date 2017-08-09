<?php
require_once ('user.php');
require_once ('Control/LoginControl.php');
$loginControl = new LoginControl();
if (isset($_COOKIE['User'])) {
    $user_Data = explode(';', $_COOKIE['User']);
    $user = new User($user_Data[0], $user_Data[1]);
    $validate = $loginControl->validateLogin($user);
    if ($validate) {
        header('Location: ' . "/DocApp/func.php");
        exit();
    }
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (empty($_POST['txtLogin']) || empty($_POST['txtSenha'])) {
            
        } else {
            $validate = $loginControl->validateLogin($user);
            $user = new User($_POST['txtLogin'], $_POST['txtSenha']);
            if ($validate) {
                header('Location: ' . "/DocApp/func.php");
                setcookie('User', $user->getLogin() . ';' . $user->getPw());
                exit();
            }
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
				<input type="text" name="txtLogin" placeholder="Usuário"
					id="input_Borders"
					value="<?php echo isset($_POST['txtLogin']) ? $_POST['txtLogin'] : ''; ?>" />
				<input type="password" name="txtSenha" placeholder="Senha"
					id="input_Borders" /> <input type="submit" value="Login" />
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
