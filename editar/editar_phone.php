<?php

session_start();
include("../con_db.php");
if ( ! isset( $_SESSION['persona'] ) ) {
	header( 'HTTP/1.0 403 NO AUTORIZADO' ); // redirigir
    die();
}

// Determina si la petición es de tipo POST
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	// si vienen los parametros correctamente 
	if ( isset( $_POST['celular'] ) ) {
		// todo bien -> verificamos que tengan datos
		if (!empty($_POST['celular']) && strlen($_POST['celular']) == 10) {
			$actualizar = "UPDATE persona SET celular = '" . $_POST['celular'] . "'";

			$resultado = mysqli_query( $conex, $actualizar ); // ejecuta la sentencia haciendo la conexion a la base de datos
			header( 'Location:index.php' );
		}
	}

} else {
	header( 'HTTP/1.0 404' );
}