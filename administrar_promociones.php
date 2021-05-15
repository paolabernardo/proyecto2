<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Administraci&oacute;n de promociones</title>
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
   <h1>Administraci&oacute;n de promociones</h1>
   
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
		<br><a href="registrar_promociones.php">Registro de promociones</a>
		<a href="consultar_promociones.php">Consultar promociones</a>
		<a href="eliminar_promo.php">Eliminar promociones</a>
		<br><br><br><a href="menu_admi.php">Menu principal</a>

		</main>

</body>
</html>
