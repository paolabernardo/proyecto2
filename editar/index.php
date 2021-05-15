<?php session_start();

if (!isset($_SESSION['persona'])) {
    header('HTTP/1.0 403 NO AUTORIZADO'); // redirigir
    die();
}


include("../Iniciar/con_db.php");

$consulta = "SELECT * FROM cliente 
        WHERE id_persona = ".$_SESSION['persona'][0];

$resultado = mysqli_query($conex, $consulta);

$cliente = mysqli_fetch_row($resultado);
$nombre = $cliente[1];                  //pendiente
$celular = $cliente[2];
$dom_exist = false;


if (!empty($resultado[2])) {
    $dom_exist = true;
    $direccion = $resultado[2] . ", Col. " . $resultado[3] . ", #" . $resultado[4] . ", Ref. " . $resultado[5];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Editar información</title>
    <meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
<center>
    <table class="default">
        <tr>
            <td><img src="img/user.png" width="50%" align="middle"></td>
            <td><h1>Editar información personal</h1></td>
        </tr>
        <table class="default">
            <tr>
                <td><h3>Nombre: </h3></td>
                <td><input type="text" name="nombre" placeholder="" value="<?php echo $_SESSION['persona'][2]; ?>" disabled="disabled">
                </td>
            </tr>

            <tr>
                <td><h3>Teléfono: </h3></td>
                <td><input type="phone" name="telefono" value="<?php echo $_SESSION['persona'][3]; ?>" placeholder=""
                           disabled="disabled"></td>
                <td><input type="button" name="editar_phone" id="editar_phone" value="Editar"></td>
            </tr>
            <?php // modificar telefono  ?>


            <tr id="modificar_phone" hidden="hidden">
                <form method="post" autocomplete="off" action="editar_phone.php">
                    <td></td>
                    <td><input type="number" name="celular" value="<?php echo $celular; ?>"
                               placeholder="Ingresa el téléfono nuevo" required></td>

                    <td><input type="submit" name="guardar_phone" value="Guardar"></td>
                </form>
            </tr>
            <tr>
                <td><h3>Dirección: </h3></td>
                <td><input type="text" name="direccion" value="<?php echo $direccion; ?>" placeholder=""
                           disabled="disabled"></td>
                <td><input type="button" name="editar_street" id="editar_street" value="Editar"></td>

                <?php // modificar direccion  ?>

            <tr id="modificar_domicilio_t" hidden="hidden">

                <h4>Nueva dirección:</h4>
                <td>Calle o Av:</td>
                <td>Colonia:</td>
                <td>Número Ext:</td>
                <td>Referencia:</td>
                <td></td>
            </tr>

            <?php // modificar direccion  ?>

            <tr id="modificar_domicilio_f" hidden="hidden">
                <form method="post" autocomplete="off" action="editar_street.php">
                    <td><input type="text" name="calle" value="<?php echo $resultado[2]; ?>"
                               placeholder="Ingresa la calle" required></td>
                    <td><input type="text" name="colonia" value="<?php echo $resultado[3]; ?>" placeholder="" required>
                    </td>
                    <td><input type="text" name="numero_exterior" value="<?php echo $resultado[4]; ?>" placeholder=""
                               required></td>
                    <td><input type="text" name="referencia" value="<?php echo $resultado[5]; ?>" placeholder=""></td>
                    <td><input type="submit" name="guardar_street" value="Guardar"></td>
                </form>
            </tr>
            </tr>

            <tr>
                <td><h3>Contraseña: </h3></td>
                <td><input type="password" name="contraseña" placeholder="*****" disabled="disabled"></td>
                <td><input type="button" name="editar_password" id="editar_password" value="Editar"></td>
            </tr>
            <?php // modificar contraseña  ?>


            <tr id="modificar_password" hidden="hidden">
                <form method="post" autocomplete="off" action="editar_password.php">
                    <td>Contraseña actual:</td>
                    <td><input type="password" name="password" placeholder="Ingresa contraseña actual" required></td>
                    <td>Contraseña nueva:</td>
                    <td><input type="password" name="new_password" placeholder="Ingresa contraseña nueva" required></td>
                    <td>Confirmar contraseña:</td>
                    <td><input type="password" name="conf_password" placeholder="Confirmar contraseña" required></td>
                    <td><input type="submit" name="guardar_password" value="Guardar"></td>
                </form>
            </tr>


</center>
<script type="text/javascript">
    $(document).ready(function () {
        $('#editar_street').on('click', function () {
            $('#modificar_domicilio_t').removeAttr("hidden");
            $('#modificar_domicilio_f').removeAttr("hidden");
        });

        $('#editar_phone').on('click', function () {
            $('#modificar_phone').removeAttr("hidden");
        });

        $('#editar_password').on('click', function () {
            $('#modificar_password').removeAttr("hidden");
        });
    });
</script>
</body>
</html>
