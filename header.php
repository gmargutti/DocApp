<?php
require_once ('user.php');
require_once ('Control/LoginControl.php');
$loginControl = new LoginControl();
session_start();
if (isset($_SESSION['logged'])) {
    if (! $_SESSION['logged']) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($_POST['txtLogin']) || empty($_POST['txtSenha'])) {} else {
                $user = new User($_POST['txtLogin'], $_POST['txtSenha']);
                $validate = $loginControl->validateLogin($user);
                if ($validate) {
                    $loginControl->updateTokenByLogin($user);
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
?>
<head>
<link rel="stylesheet" type="text/css" href="CSS/style.css">
<link href="https://fonts.googleapis.com/css?family=Roboto"
	rel="stylesheet">
<script type="text/javascript">
$(document).ready(function(){
    $("#QuemSomos").on("click", function(e){
    	e.preventDefault();
    	var id = $(this).get(0).id;
    	var target;
    	switch(id){
    	case "QuemSomos":
    		target = $("#contentQuemSomos");
    		break;
    	}
    	$("html, body").stop().animate({
    			scrollTop: target.offset().top
    		}, 500);
    });
});
</script>
</head>
<body>
	<div class="menuHeader">
		<div class="loginHeader">
			<?php
$path = "login_form.php";
if (isset($_SESSION['logged'])) {
    if ($_SESSION['logged']) {
        $path = "func.php";
    }
}
include ($path);
?>
		</div>
		<div class="logoHeader">
			<div class="logoText">
				<p>DocApp</p>
			</div>
		</div>
		<div class="menu">
			<table>
				<tr>
					<td class="divider"><a href="index.php"> <img src="images/logo2.png"
							height="64px" width="64px" />
					</a>
					</td>
					<td>
						<a href="" id="QuemSomos">
						<strong>Quem Somos</strong>
						<img alt="" src="Images/down_arrow.png" height="16px" width="16px" id="tbImg_Padding" />
						</a>
					</td>
				</tr>
			</table>
		</div>
	</div>
</body>
