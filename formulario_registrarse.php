<!DOCTYPE html>
<html>
<head>
	<title>Registrarse</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/Registro.css">
</head>
<body>
    <form method="post" autocomplete="off">
    	<h1>Registrarse</h1>
    	<input type="text" name="nombre" placeholder="Nombre">
		<input type="text" name="apellido" placeholder="Apellido">
		<input type="text" name="celular" placeholder="Celular">
    	<input type="email" name="email" placeholder="Correo electrónico">
		<input type="password" name="contraseña" placeholder="Contraseña">

    	<input type="submit" value= "Registrarse" name="register">
		<input type="submit" value= "Iniciar Sesi&oacute;n" name="Iniciar">
    </form>
        <?php 
        include("registrarse.php");
        ?>
</body>
</html>