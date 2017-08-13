<form action="" method="post">
	<input type="text" name="txtLogin" placeholder="Usuário"
		id="input_Borders"
		value="<?php echo isset($_POST['txtLogin']) ? $_POST['txtLogin'] : ''; ?>" />
	<input type="password" name="txtSenha" placeholder="Senha"
		id="input_Borders" /> <input type="submit" value="Login" />
</form>