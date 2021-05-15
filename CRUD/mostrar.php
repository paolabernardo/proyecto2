<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>

<?php 
// $conexion = pg_connect("host=localhost port=5432 user=nombreUsuario password=passwordUsuario dbname=nomBD", PGSQL_CONNECT_FORCE_NEW);
// $conexion = pg_connect("host=localhost dbname=BASE_DE_DATOS user=USUARIO password=CONTRASEÑA");		

$mysql = new mysqli("localhost", "root", "", "agenda");
$Query = "select * from contactos";
$Result = $mysql->query( $Query );


$numeroRegistros=$Result->num_rows;
if($numeroRegistros<=0) 
   { 
     echo "<div align='center'>"; 
     echo "<h2>No se encontraron resultados</h2>"; 
     echo "</div><hr> "; 
   }else{
   ?>
       <table border=1>
        <tr>
		<td><strong> Nombre</strong></td>
		<td><strong> Direccion</strong></td>
		<td><strong> Telefono</strong></td>
		<td><strong> Email</strong></td>
		</tr>
		<?php
		 // fetch_array() Obtiene una fila de resultado como un array asociativo
        while($row =$Result->fetch_array()) {	    
           ?>
		   <tr>
		   <td> <?php printf($row["nombre"]); ?>   </td>
		   <td> <?php printf($row["direccion"]); ?>   </td>
		   <td> <?php printf($row["telefono"]); ?>   </td>
		   <td> <?php printf($row["email"]); ?>   </td>
           </tr>
		   
<?php	
	}
}
?>
</table>

<?php
echo "<br><br><a href= index.php>Regresar</a>";
?>
</body>
</html>
