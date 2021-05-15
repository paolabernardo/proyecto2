<link rel="stylesheet" href="css/carrito.css?v=<?php echo time();?>">
<?php
include("Iniciar/con_db.php");
include("carrito.html");
session_start();
?>

<?php
$Query = "select nombre, descripcion, precio, unidades, image_url, cliente_producto.id_producto from producto 
natural join cliente_producto where id_cliente =".$_SESSION['cliente'][0];
$Result = $conex->query( $Query );

$numeroRegistros=$Result->num_rows;
if($numeroRegistros<=0) 
   { 
     echo "<div align='center'>"; 
     echo "<h2>No se han agregado productos al carrito</h2>"; 
     echo "</div><hr> "; 
   }else{
   ?>
   <main>
   <center>
   <h1>Mi carrito de compras</h1>
   
       <table class = "tabla">
		   <thead class = "titulos">
        <tr>
        
        <td><strong> Imagen del producto</strong></td>
		<td><strong> Producto</strong></td>
		<td><strong> Descripci&oacute;n</strong></td>
		<td><strong> Precio</strong></td>
		<td><strong> Unidades</strong></td>
		<td><strong> Total de los productos</strong></td>
    <td><strong></strong></td>
		</tr>
		</thead>
		<?php
        $total = 0;
        while($row =$Result->fetch_array()) {
          $prod = $row[5];
           ?>
		   <tbody class = "relleno">
		   <tr>
           <td> <img src="<?php printf($row[4]); ?>" class = "imagen"></td>
		   <td> <?php printf($row[0]); ?>   </td>
		   <td> <?php printf($row[1]); ?>   </td>
		   <td> <?php printf("$".$row[2].".00"); ?>   </td>
		   <td> <?php printf($row[3]); ?>   </td>
		   <td> <?php printf("$".$row[2]*$row[3].".00"); ?>   </td>
       <td> <a href="eliminar_pc.php ? id=<?php print($prod); ?>">Eliminar</a></td>
           </tr>
		   </tbody>
		   
		</center>
<?php
$total = $total+($row[2]*$row[3]);	
	}

?>
</table>
        <h1>Total de la compra: $<?php echo $total; ?>.00</h1><br>
        <form action="solicitud.php" method="post">
        <input type="hidden" value = "<?php echo $total;?>" name="total"/>
        <input type="submit" value = "Solicitar pedido" class = solicitar>
        </form>
		</main>
   <?php 
   }
   ?> 
</body>
</html>


