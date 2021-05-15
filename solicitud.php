<link rel="stylesheet" href="css/solicitud.css?v=<?php echo time();?>">
<?php 
include("Iniciar/con_db.php");
include("solicitud.html");
session_start();

if (!isset($_POST['total'])) {
    header('location:carrito.php');
}

$Query = "SELECT nombre, celular, d_calle_Ac, d_colonia, d_numero, d_referencia from persona 
natural join cliente where id_cliente = " . $_SESSION['cliente'][0];
$Result = $conex->query($Query);
$Result = mysqli_fetch_row($Result);
$nombre = $Result[0];
$celular = $Result[1];
//$direccion = "Calle: ". $Result[2]. "  Colonia: ". ($Result)[3]. "   Número: ". ($Result)[4]. "   Referencia: ". ($Result)[5];
$calle = "Calle: " . $Result[2];
$colonia = "Colonia: " . $Result[3];
$num = "Numero: " . $Result[4];
$ref = "Referencia: " . $Result[5];
?>

<main>
    <center>
        <h1>Solicitud de Pedido</h1>

        <form action="cerrarpedido.php" method="post">
            <table class="">
                <tr>
                    <td><strong><h2>Método de pago:</h2></strong></td>
                    <th><strong><label for="efectivo">Efectivo</label></strong></th>
                    <td><input type="radio" id="efectivo" name="metodo_pago" value="efectivo" checked></td>
                    <th><strong><label for="tarjeta">Tarjeta</label></strong></th>
                    <td><input type="radio" id="tarjeta" name="metodo_pago" value="tarjeta"></td>
                    <input type="hidden" name="total" id="total" value="<?php echo $_POST['total'] ?>">
                </tr>

                <table class = "tabla">
		        <thead class = "titulos">
                    <tr>
                        <td><strong> Nombre</strong></td>
                        <td><strong> Número</strong></td>
                        <td><strong> Dirección</strong></td>
                    </tr>
                </thead-->

                <tbody class = "relleno">
                    <tr>
                        <td> <?php printf($nombre); ?>   </td>
                        <td> <?php printf($celular); ?>   </td>
                        <td> <?php printf($calle);
                                   echo "<br>";
                                   printf($colonia);
                                   echo "<br>";
                                   printf($num);
                                   echo "<br>";
                                   printf($ref); ?> </td>
                    </tr>
	            </tbody>
                </table>
                <h1>Total de la compra: <?php echo "$" . $_POST['total'] ?>.00</h1>
                <input type="button" value="Cancelar pedido" class="cancelar" onclick="location.href='menu_cliente.php'">
                <input type="submit" value="Cerrar pedido" class="cerrar">
        </form>

    </center>
</main>
</body>
</html>