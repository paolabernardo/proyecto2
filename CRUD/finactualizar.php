<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>
<body>
<?php 
// $conexion = pg_connect("host=localhost port=5432 user=nombreUsuario password=passwordUsuario dbname=nomBD", PGSQL_CONNECT_FORCE_NEW);
// $conexion = pg_connect("host=localhost dbname=BASE_DE_DATOS user=USUARIO password=CONTRASEÑA");
		
$nom=$_POST["Nombre"];
$dir=$_POST["Direccion"];
$tel=$_POST["Telefono"];
$email=$_POST["Email"];
$mysql = new mysqli("localhost", "root", "", "agenda");
$Query = "UPDATE contactos SET nombre = '".$nom."', direccion = '".$dir."', telefono = '".$tel."', email = '".$email."'
WHERE nombre = '".$nom."'";


//OR direccion = '".$dir."'
//OR telefono = '".$tel."'
//OR email = '".$email."'"
$Result = $mysql->query( $Query );
if($Result!=null){
   	print("Se actualizó con éxito el registro.");
	echo "<br><a href= index.php>Regresar</a>";}
else
  	print("No se pudo actualizar");

	
?>
</table>
</body>
</html>
