<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['usrLogin']) || empty($_POST['usrPassword'])) {} else {
        require_once ('./Control/LoginControl.php');
        require_once ("./user.php");
        $control = new LoginControl();
        $user = new User($_POST['usrLogin'], $_POST['usrPassword']);
        $control->register($user);
    }
}
?>
<head>
<link rel="stylesheet" type="text/css" href="CSS/style.css">
<link href="https://fonts.googleapis.com/css?family=Roboto"
	rel="stylesheet">
</head>
<title>Register</title>
<body>
	<form action="" method="post">
		<div class="menuHeader headerRegister">
			<div class="docApp_Image">
				<img alt="" src="/DocApp/images/logo2.png" width="156px"
					height="156px">
			</div>
			<div class="registerMenu">
				
			</div>
			<div class="registerText docApp_Text">
				<strong>DocApp</strong>
			</div>
			<div class="registerText">
				<strong>Cadastrar</strong>
			</div>
		</div>
		<div class="register">
			<table>
				<tr>
					<td>
						<div id="placeHolder_Icon">
							<input type="text" name="usrLogin" value="" tabindex="1"
								placeholder="Username" id="input_Borders" /> <i
								class="fa fa-user-o" id="fa_Icon"></i>
						</div>
					</td>
					<td rowspan="2"><input id="btn_Login" type="submit" value="OK" /></td>
				</tr>
				<tr>
					<td>
						<div id="placeHolder_Icon">
							<input type="password" name="usrPassword" tabindex="2"
								placeholder="Password" id="input_Borders" /> <i
								class="fa fa-key" id="fa_Icon"></i>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</form>
</body>
