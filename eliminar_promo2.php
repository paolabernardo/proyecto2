<?php
include("Iniciar/con_db.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar promocion</title>
    <link rel="stylesheet" href="css/adm_css.css">
</head>
<body>
    <?php
    $iddd = $_GET['id'];
    $Query = "delete from promociones where id_promocion='".$iddd."'";
    $Result = $conex->query( $Query );
    if($Result!=null){
        ?>
        <h1>Se elimino con éxito el registro.</h1>
        <?php
        echo "<center><br><a href= administrar_promociones.php>Regresar</a></center>";}
 
 else
       print("No se pudo eliminar");
    ?>
</body>
</html>