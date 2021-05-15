<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/Registro.css">
</head>
<body>
    <form method="post">
    	<h1>Iniciar sesión</h1>
			<h2>Email</h2>
    	<input type="text" name="email" placeholder="example@gmail.com">
			<h2>Contraseña</h2>
			<input type="password" name="passw" placeholder="Contraseña">
    	<input type="submit" name="Ingresar" value="Ingresar">
    </form>
		<?php
			include("validar.php");
		?>
</body>
</html>
