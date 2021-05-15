<link rel="stylesheet" href="css/solicitud.css?v=<?php echo time();?>">
<?php 
include("Iniciar/con_db.php");
include("cerrarpedido.html");
session_start();

if (!isset($_POST['metodo_pago'])) {
    header('location:solicitud.php');
}

    //Obtiene el método de pago seleccionado
    $pago = $_POST['metodo_pago'];

    //Obtener los productos del carrito
    $consulta = "SELECT * FROM cliente_producto WHERE id_cliente = '".$_SESSION['cliente'][0]."'";
    $resultado = mysqli_query($conex,$consulta);

    //Obtener la fecha actual en formato año-mes-dia
    $fechaactual = getdate();
    $fecha = $fechaactual['year']."-".$fechaactual['mon']."-".$fechaactual['mday'];
  
    $descripcion="";
    $precio=0;

    while($carrito = $resultado->fetch_array()){
    //Obtiene la información de los productos que están dentro del carrito
    $consulta2 = "SELECT * FROM producto WHERE id_producto = '".$carrito['id_producto']."'";
    $resultado2 = mysqli_query($conex,$consulta2);
    $producto = $resultado2->fetch_array();

    //Obtiene la descripción y el precio total de los productos en el carrito
    $descripcion = $descripcion.$carrito['unidades']." ".$producto['nombre']."\n";
    $precio += $carrito['unidades']*$producto['precio'];

    //Actualiza existencias del producto en la base de datos en la tabla producto
    $existencias = $producto['existencias']-$carrito['unidades'];
    $consulta4 = "UPDATE producto SET existencias = '".$existencias."' WHERE id_producto =  '".$carrito['id_producto']."'";
    $resultado4 = mysqli_query($conex,$consulta4);
    }

    // Crea la venta en la base de datos en la tabla venta
    $consulta3 = "INSERT INTO venta VALUES (default,'".$precio."','".$pago."','".$fecha."','".$descripcion."','".$_SESSION['cliente'][0]."')";
    $resultado3 = mysqli_query($conex,$consulta3);
    
    //Limpia el carrito para todos los productos que hay en carrito
    $consulta5 = "DELETE FROM cliente_producto WHERE id_cliente = '".$_SESSION['cliente'][0]."'";
    $resultado5 = mysqli_query($conex,$consulta5);
?>

<!-- Mensaje de cerrar pedido  -->
<main>
    <center>
    <h1>Cerrar pedido</h1>
    <form action="menu_cliente.php" method="POST">
        <h2> Tu pedido se ha realizado correctamente </h2>
        <h2> Tiempo de entrega : 30 minutos </h2>
        <input type="submit" value="inicio" class="inicio">
    </form>

    </center>
</main>
</body>
</html>