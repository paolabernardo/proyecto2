<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<?php
$nom=$_GET['Nombre'];
$mysql = new mysqli("localhost", "root", "", "agenda");
$Query = "select * from contactos where nombre='".$nom."'";
$Result = $mysql->query( $Query );

$numeroRegistros=$Result->num_rows;
if($numeroRegistros<=0) 
   { 
     echo "<div align='center'>"; 
     echo "<h2>No se encontraron resultados</h2>"; 
     echo "</div><hr> "; 
   }
    $row =$Result->fetch_array();
    ?>

   <form action="finactualizar.php" target="" method="POST">
            <TABLE BORDER="1" ALIGN="CENTER">
                <TR>
                    <TD><strong>Nombre</strong> </TD>
                    <td><input type=text size=40 name="Nombre" value=<?php printf($row["nombre"]);?>></td>
                </TR>
               
                <TR>
                    <TD><strong>Direccion</strong> </TD>
                    <td><input type=text size=40 name="Direccion" value=<?php printf($row["direccion"]);?>></td>
                </TR>
                <TR>
                    <TD><strong>Telefono</strong> </TD>
                    <td><input type=text size=40 name="Telefono" value=<?php printf($row["telefono"]);?>></td>
                </TR>
                <TR>
                    <TD><strong>Email</strong> </TD>
                    <td><input type=text size=40 name="Email" value=<?php printf($row["email"]);?>></td>
                </TR>
                
                
            </TABLE>
            <BR>
                <BR>
            <center> <input type=submit value="Agregar a BD" ></center>
        </form>
</body>
</html>