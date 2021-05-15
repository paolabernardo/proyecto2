<?php 
session_start();

include ("con_db.php");

if (isset($_POST['Ingresar'])){

            if(strlen($_POST['email']) >= 1  && strlen($_POST['passw']) >= 1){
              $email = trim($_POST['email']);
              $passw = trim($_POST['passw']);
              $resultado = null;
              $consulta="SELECT * FROM persona WHERE email = '".$email."' AND contraseña  = '".$passw."'";  
              $resultado = mysqli_query($conex,$consulta);
             

            if($resultado->num_rows > 0){         //por cada consulta se necesita la 15 y 16
            $datos = mysqli_fetch_row($resultado);
            $_SESSION['persona'] = $datos;
            //mysqli_close($conex);

                if($datos[0]==1){
                header("Location: ../menu_admi.php");
                exit();
                }else{
                  $consulta="SELECT * FROM cliente WHERE id_persona = ".$datos[0];  
                  $resultado = mysqli_query($conex,$consulta);
                  if($resultado->num_rows > 0){
                    $d_cliente = mysqli_fetch_row($resultado);
                   
                    $_SESSION['cliente'] = $d_cliente;
                    //mysqli_close($conex);
                  }
                }
            }
        
      if($resultado->num_rows > 0){
        ?>
        <?php
        header("Location: ../menu_cliente.php");
          } else {
            ?>
        <h3 class="bad">¡Datos no registrados!</h3>
        <?php
        }
      } else {
        ?>
        <h3 class="bad">¡Por favor complete los campos!</h3>
          <?php
      }
  } 



 ?>
