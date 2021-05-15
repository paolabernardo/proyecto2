<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Agregar empleado</title>
	<link rel="stylesheet" href="css/adm_css.css">
</head>
<body>
	
</body>
</html>
<?php 

include("Iniciar/con_db.php");

if (isset($_POST['register'])) {
    if (strlen($_POST['Nombre']) >= 1 && strlen($_POST['Apellido']) >= 1 && strlen($_POST['Celular']) >= 1
	&& strlen($_POST['Email']) >= 1 && strlen($_POST['Cargo']) >= 1 && strlen($_POST['Sueldo']) >= 1) {

	    $nombre = trim($_POST['Nombre']);
		$apellido = trim($_POST['Apellido']);
		$celular = trim($_POST['Celular']);
	    $email = trim($_POST['Email']);
		$cargo = trim($_POST['Cargo']);
		$sueldo = trim($_POST['Sueldo']);


	    $consulta = "INSERT INTO persona(nombre, apellido, celular, email) VALUES ('$nombre','$apellido','$celular','$email')";
		$resultado = mysqli_query($conex,$consulta);
		$lastid = mysqli_insert_id($conex);
		$consulta2 = "INSERT INTO empleado(cargo,sueldo,id_persona) 
		VALUES ('$cargo','$sueldo','$lastid')";
		$resultado2 = mysqli_query($conex,$consulta2);
		

		mysqli_close($conex);


	    if ($resultado2) {
	    	?> 
			<!--
	    	<h3 class="ok">¡Empleado registrado!</h3><br><br>
			<a href="administrar_empleados.php">Volver</a>-->
           <?php
		   header ("Location: administrar_empleados.php");
	    } else {
	    	?> 
	    	<h3 class="bad">¡Lo sentimos, ya hay un empleado con esos datos!</h3>
			<center><a href="registrar_empleado.php">Volver</a></center>
           <?php
	    }
    }   else {
	    	?> 
	    	<h3 class="bad">¡Por favor complete los campos!</h3>
			<center><a href="registrar_empleado.php">Volver</a></center>
           <?php
    }
}
?>