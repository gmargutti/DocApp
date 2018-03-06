<?php error_reporting(E_ALL);?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
<link href="https://fonts.googleapis.com/css?family=Roboto"
	rel="stylesheet">
<link rel="stylesheet" type="text/css" href="CSS/sideMenu.css">
<link rel="stylesheet" type="text/css" href="CSS/style.css">
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
	function loadContent(uri){
		$('#content').load(uri);
		return false;
	}
</script>
</head>
<title>DocApp</title>
<body style="font-family: 'Roboto', sans-serif;">
<?php
require_once ('Model/user.php');
require_once ('Control/LoginControl.php');
$loginControl = new LoginControl();
session_start();
if (isset($_SESSION['logged'])) {
    if (! $_SESSION['logged']) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnLogin'])) {
            if (empty($_POST['txtLogin']) || empty($_POST['txtSenha'])) {
                
            } else {
                $user = new User($_POST['txtLogin'], $_POST['txtSenha']);
                $validate = $loginControl->validateLogin($user);
                if ($validate) {
                    $loginControl->updateTokenByLogin($user);
                    $_SESSION['User_Nome'] = $user->getNome();
                    $_SESSION['logged'] = true;
                    header('Location: ' . "/DocApp/index.php");
                }
            }
        }
    }
} else {
    $_SESSION['from'] = $_SERVER['REQUEST_URI'];
    header('Location: ' . '/DocApp/Control/user_validation.php');
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['btnLogoff'])) {
        include $_SERVER['DOCUMENT_ROOT'] . "/DocApp/Util/Cleaner.php";
        Cleaner::clean();
        header('Location: ' . "/DocApp");
        die();
    } else {
        if(isset($_POST['btnRegister'])){
            header('Location: ' . '/DocApp/register.php');
        }
    }
}
?>
	<div id="indexBG"></div>
	<div class="sideMenu">
		<div class="logo">
			<img src="/DocApp/images/logo_menu.png" width="200px" height="100px" />
		</div>
		<div class="login">
			<?php
if (isset($_SESSION['logged']) && $_SESSION['logged']) {
    echo 'Bem vindo, ' . $_SESSION['User_Nome'];
} else {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/DocApp/login_form.php';
}
?>
		</div>
		
		<?php 
		  $result = $loginControl->getSitePages();
		  foreach($result as $page){
		?>
			<div class="pages">
				<a class="links" href='#' onclick="loadContent('<?php echo $page['URI'];?>'); return false;"><?php echo $page['Description'];?></a>
			</div>
		<?php 
		  }                                                                                           
		?>
		<form action="" method="POST">
        	<input type="text" name="txtEmail" />
        	<input type="submit" name="btnEmail" value="Validate Email" />
        	<?php 
        	if(isset($_POST["btnEmail"]) && isset($_POST["txtEmail"]) && !empty($_POST["txtEmail"])){
        	    $stringRegEx = "/[a-zA-Z|0-9|.|_]+[@][a-z]+[.][a-z]+/";
        	    if(preg_match($stringRegEx, $_POST["txtEmail"], $matches, PREG_OFFSET_CAPTURE)){
        	       echo "Email Valido";
        	    }
        	    else{
        	        echo "Email Invalido";
        	    }
        	}
        	?>
		</form>
		<div class="footer">
		<?php
if (isset($_SESSION['logged']) && $_SESSION['logged']) {
    
    ?>
	      <form action="" method="POST">
				<input type="submit" name="btnLogoff" value="Desconectar" />
			</form>
		  <?php
} else {
    ?>
          <form action="" method="POST">
				<input type="submit" name="btnRegister" value="Cadastrar" />
			</form>
		   <?php
}
?>
			
		</div>
	</div>
	<div id="content"></div>
</body>
