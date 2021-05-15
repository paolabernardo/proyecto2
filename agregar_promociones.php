<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro de promociones</title>
	<link rel="stylesheet" href="css/adm_css.css">
</head>
<body>
<?php 


include ("Iniciar/con_db.php");

if(strlen($_POST['Nombre']) >= 1  && strlen($_POST['Precio']) >= 1 
&& strlen($_POST['desc']) >= 1 && strlen($_POST['IDproducto']) >= 1){

	$Query= "INSERT INTO promociones (nombre, precio, descripcion, id_producto) 
	VALUES ('".$_POST["Nombre"]."','".$_POST["Precio"]."','".$_POST["desc"]."','".$_POST["IDproducto"]."')";
	$Result = $conex->query( $Query );

	if($Result!=null){
		header ("Location: administrar_promociones.php");
	}
	else{
		?>
		<h3 class="bad">¡Lo sentimos, ya hay una promocion con esos datos!</h3>
        <center><a href="registrar_promociones.php">Volver</a></center>
		<?php
	}

}else{
	?>
		 <h3 class="bad">¡Llena todos los campos!</h3>
                     <center><a href="registrar_promociones.php">Volver</a></center>
					 <?php
}

   ?>
</body>
</html>
