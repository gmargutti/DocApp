<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['usrLogin']) || empty($_POST['usrPassword'])) {} else {
        require_once ('./Control/LoginControl.php');
        require_once ("Model/user.php");
        $control = new LoginControl();
        $user = new User($_POST['usrLogin'], $_POST['usrPassword']);
        $user->setCPF($_POST['user_CPF']);
        $user->setDataNascimento($_POST['user_DataNascimento']);
        $user->setLogradouro($_POST['user_Logradouro']);
        $user->setNome($_POST['user_Nome']);
        $user->setRG($_POST['user_RG']);
        $control->register($user);
    }
}
?>
<head>
</head>
<title>Register</title>
<body>
	<form action="" method="post">
		<div class="menuHeader headerRegister">
			<div class="docApp_Image">
				<img alt="" src="/DocApp/images/logo2.png" width="156px"
					height="156px">
			</div>
			<div class="registerMenu"></div>
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
								placeholder="Usuario" id="input_Borders" /> <i
								class="fa fa-user-o" id="fa_Icon"></i>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div id="placeHolder_Icon">
							<input type="password" name="usrPassword" tabindex="2"
								placeholder="Senha" id="input_Borders" /> <i class="fa fa-key"
								id="fa_Icon"></i>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div id="placeHolder_Icon">
							<input type="text" name="user_Nome" placeholder="Nome"
								id="input_Borders" />
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div id="placeHolder_Icon">
							<input type="text" name="user_DataNascimento"
								placeholder="Data de Nascimento" id="input_Borders" />
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div id="placeHolder_Icon">
							<input type="text" name="user_RG" placeholder="RG"
								id="input_Borders" />
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div id="placeHolder_Icon">
							<input type="text" name="user_CPF" placeholder="CPF"
								id="input_Borders" />
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div id="placeHolder_Icon">
							<input type="text" name="user_Logradouro" placeholder="Nome"
								id="input_Borders" />
						</div>
					</td>
				</tr>
				<tr>
					<td><input id="input_Borders" type="submit" value="OK"/></td>
				</tr>
			</table>
		</div>
	</form>
</body>
