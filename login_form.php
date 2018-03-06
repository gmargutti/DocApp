<form action="" method="POST">
	<input type="text" name="txtLogin" placeholder="Usuário"
		id="input_Borders"
		value="<?php echo isset($_POST['txtLogin']) ? $_POST['txtLogin'] : ''; ?>" />
	<input type="password" name="txtSenha" placeholder="Senha"
		id="input_Borders" /> 
		<input id="btnLogin" type="submit" value="Conectar" name="btnLogin" />
</form>