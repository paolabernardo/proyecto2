<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de producto</title>
    <link rel="stylesheet" href="css/adm_css.css">
</head>
<body>
<?php 
include ("Iniciar/con_db.php");
if(strlen($_POST['Nombre']) >= 1  && strlen($_POST['Precio']) >= 1 
&& strlen($_POST['Existencias']) >= 1 && strlen($_POST['Descripcion']) >= 1 && isset($_FILES["image"])){
//cambiar el strlen por isset
    $rimgs = $_FILES["image"]["tmp_name"];
    $nomimg = $_FILES["image"]["name"];
    $dir = "img/productos/";
    $rimgg = $dir.$nomimg;

    if(move_uploaded_file($rimgs, $rimgg)){

    

    $Query= "INSERT INTO producto (`nombre`, `precio`, `existencias`, `descripcion`, `image_url`) 
    VALUES ('".$_POST["Nombre"]."','".$_POST["Precio"]."','".$_POST["Existencias"]."','".$_POST["Descripcion"]."','".$rimgg."')";
    $Result = $conex->query( $Query );
    if($Result!=null){
        header ("Location: administrar_productos.php");
         } else {
                 ?> 
                 <h3 class="bad">¡Lo sentimos, ya hay un producto con esos datos!</h3>
                     <center><a href="registrar_producto.php">Volver</a></center>
        <?php } ?> 
        <?php
}else{  ?>
    <h3 class="bad">¡Llena todos los campos!</h3>
                     <center><a href="registrar_producto.php">Volver</a></center>
                     <?php
}

}else
echo "<h1>No se guarda</h1>";
?>


                
       
</body>
</html>

