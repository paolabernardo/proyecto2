<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Consulta de promociones</title>
	<link rel="stylesheet" href="css/adm_css.css">
</head>
<body>


<?php
include ("Iniciar/con_db.php");
$Query = "select * from promociones";
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
   <h1>Consulta de promociones</h1>
   
       <table class = "tabla">
		   <thead class = "titulos">
        <tr>
		<td><strong> id_promocion</strong></td>
		<td><strong> Nombre</strong></td>
		<td><strong> Precio</strong></td>
		<td><strong> id_producto</strong></td>
		</tr>
		</thead>
		<?php
        while($row =$Result->fetch_array()) {	    
           ?>
		   <tbody class = "relleno">
		   <tr>
		   <td> <?php printf($row["id_promocion"]); ?>   </td>
		   <td> <?php printf($row["nombre"]); ?>   </td>
		   <td> <?php printf("$".$row["precio"].".00"); ?>   </td>
		   <td> <?php printf($row["id_producto"]); ?>   </td>
           </tr>
		   </tbody>
		</center>
<?php	
	}
}
?>
</table>
		<br><a href="administrar_promociones.php">Volver</a>

		</main>

</body>
</html>
