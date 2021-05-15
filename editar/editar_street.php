<?php 

session_start();
include("../con_db.php");
if ( ! isset( $_SESSION['persona'] ) ) {
     header( 'HTTP/1.0 403 NO AUTORIZADO' ); // redirigir
    die();
//    header('Location:../IngSoftware/login.php');
}

// Determina si la petición es de tipo POST
if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	
	// si vienen los parametros correctamente 
	if (isset($_POST['calle']) || isset($_POST['colonia']) || isset($_POST['numero_exterior']) || isset($_POST['referencia'])) {
		// todo bien -> verificamos que tengan datos
		if (!(empty($_POST['calle']) || empty($_POST['colonia']) || empty($_POST['numero_exterior']) || empty($_POST['referencia']))) {
			// Query de mysql
			$actualizar = "UPDATE cliente SET d_calle_Ac='".$_POST['calle']."', d_colonia='".$_POST['colonia']."', d_numero='".$_POST['numero_exterior']."',d_referencia='".$_POST['referencia']."' WHERE id_persona = '" . $_SESSION['persona']['id_persona'] . "'";

			$resultado = mysqli_query($conex, $actualizar); // ejecuta la sentencia haciendo la conexion a la base de datos
			header('Location:index.php');
		}
	}

}else{
	header('HTTP/1.0 404');
}
