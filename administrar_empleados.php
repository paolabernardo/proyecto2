<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Administraci&oacute;n de empleados</title>
	<link rel="stylesheet" href="css/adm_css.css">
</head>
<body>

<?php
include ("Iniciar/con_db.php");
$Query = "select * from empleado";
$Result = $conex->query( $Query );


$numeroRegistros=$Result->num_rows;
if($numeroRegistros<=0) 
   { 
     echo "<div align='center'>"; 
     echo "<h2>No se encontraron resultados</h2>"; 
     echo "</div><hr> "; 
   }else{
   ?>
   <main>
   <center>
   <h1>Administraci&oacute;n de empleados</h1>
   
       <table class = "tabla">
		   <thead class = "titulos">
        <tr>
		<td><strong> id_empleado</strong></td>
		<td><strong> Cargo</strong></td>
		<td><strong> Sueldo</strong></td>
		<td><strong> id_persona</strong></td>
		</tr>
		</thead>
		<?php
        while($row =$Result->fetch_array()) {	    
           ?>
		   <tbody class = "relleno">
		   <tr>
		   <td> <?php printf($row["id_empleado"]); ?>   </td>
		   <td> <?php printf($row["cargo"]); ?>   </td>
		   <td> <?php printf($row["sueldo"]); ?>   </td>
		   <td> <?php printf($row["id_persona"]); ?>   </td>
           </tr>
		   </tbody>
		</center>
<?php	
	}
}
?>
</table>
		<br><a href="registrar_empleado.php">Registro de empleados</a>
		<a href="consultar_empleados.php">Consultar empleados</a>
		<br><br><br><a href="menu_admi.php">Menu principal</a>

		</main>
<?php
//echo "<br><br><a href= index.php>Regresar</a>";
?>
</body>
</html>
