<?php
require_once ('user.php');
require_once ('Control/LoginControl.php');
$loginControl = new LoginControl();
session_start();
if(isset($_COOKIE['Data'])){
    echo $_COOKIE['Data'];
    if(!isset($_SESSION['Data'])){
           
    }
}
else{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (empty($_POST['txtLogin']) || empty($_POST['txtSenha'])) {
            
        } else {
            //session_start();
            $user = new User($_POST['txtLogin'], $_POST['txtSenha']);
            $validate = $loginControl->validateLogin($user);
            if ($validate) {
                $hash = $user->getId() . '$' . password_hash($user->getPassword(), PASSWORD_BCRYPT);
                setcookie("Data", $hash, time() + 10);
                $_SESSION["Data"] = $hash;
                //header('Location: ' . "/DocApp/func.php");                
                //exit();
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
			<?php 
			$path = "login_form.php";
			if(isset($_COOKIE['Data']) && isset($_SESSION['Data'])){
			    if($_COOKIE['Data'] === $_SESSION['Data']){
                    $path = "func.php";
			    }
			}
			include($path);
			?>
		</div>
		<div class="logoHeader">
			<img src="images/logo.png" height="64px" width="64px" />
			<div class="logoText">
				<p>Texto App Legal</p>
			</div>
		</div>

	</div>
</body>
