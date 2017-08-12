<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['usrLogin']) || empty($_POST['usrPassword'])) {
        
    } else {
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
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<title>Test Page PHP</title>
<body>
  <?php include("header.php"); ?>
  <form action="" method="post">
		<div id="content">
			<table>
				<tr>
					<td><i class="fa fa-sign-in fa-lg" aria-hidden="true"></i>
						<p>
							<font color="white">Register</font>
						</p></td>
				</tr>
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
