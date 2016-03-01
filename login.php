
<?php

  include_once("./configuracion_bd.php");

  session_start();
unset($_SESSION['id']);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="librerias/jquery-2.2.0.min.js"></script>
    <script src="./librerias/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
    <script rel="stylesheet" href="./librerias/jquery-ui-1.11.4.custom/jquery-ui.css"></script>
    <title>PROYECTOMS</title>
    <link rel="stylesheet" type="text/css" href="estilos/general.css">
      <link href='https://fonts.googleapis.com/css?family=Dosis:600' rel='stylesheet' type='text/css'>
  </head>
  <body>

    <?php
         if (isset($_SESSION["usuario"])) {
              header("Location: ./area_usuario/usuario.php");
         }
        if (isset($_POST["usuario"])) {

          $connection = new mysqli($db_host, $db_user, $db_password,$db_name);

          if ($connection->connect_errno) {
              printf("Conexión fallida: %s\n", $connection->connect_error);
              exit();
          }
          $query = $connection->prepare("SELECT nivel_adm FROM usuario WHERE nombre_usuario=? AND pass=md5(?)");
          $query->bind_param("ss",$_POST["usuario"],$_POST["pass"]);
          if ($query->execute()) {
               $query->store_result();
              if ($query->affected_rows===0) {
                echo "LOGIN INVALIDO";
              } else {
                $query->bind_result($nivel);
                $resultado = $query->fetch();
                  $_SESSION["usuario"]=$_POST['usuario'];
                $_SESSION["nivel"]=$nivel;
                $_SESSION["tema"]=array("cabecera","pie","liscab","liscont","listausu","cancab","cancont","editarlista","editn","editc","editc2","cuerpazo","cancont2");
                $_SESSION["language"]="es";
                header("Location: ./area_usuario/usuario.php");
              }
          } else {
            echo "Wrong Query";
            var_dump($consulta);
          }
      }
    ?>
      <div class="cabecera"><div id="cabecera1">
          <img src="./img/headphones2.png"><p>  <?php if (isset($_GET['status'])) {
        echo "¡El usuario se ha creado satisfactoriamente! Procede a iniciar sesión para disfrutar del servicio";
    } else {
    echo "Proyecto de Implantación Alvaro Garrido Soto- proyectoms";
    }
?></p></div><div id="cabecera2"><p>Identifícate como usuario normal o Administrador</p></div>
      </div>
      
      <div class="logform">
          <div class="formcab">Incia sesión</div>
          <div class="formcont">
        <form action="login.php" method="post">
        
            <p>Usuario: &nbsp &nbsp &nbsp &nbsp &nbsp <input name="usuario" required></p>
            <p>Contraseña: &nbsp <input name="pass" type="password" required></p>
            <p><input type="submit" value="Entrar"></p>

        </form>
        </div>
      </div>
      <div class="botoncrear"><a href="crearusuario.php">Crear usuario</a></div>
    

      <div class="pie"><p>Inicia sesión y comienza a escuchar tu música favorita en cualquier momento</p></div>
  </body>
</html>