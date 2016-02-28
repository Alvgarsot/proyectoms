<?php
  session_start();
  include_once("./configuracion_bd.php");
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
    <title></title>
    <link rel="stylesheet" type="text/css" href="estilos/general.css">
      <link href='https://fonts.googleapis.com/css?family=Dosis:600' rel='stylesheet' type='text/css'>
  </head>
  <body>

    <?php
         if (isset($_SESSION["usuario"])) {
              header("Location: ./area_usuario/usuario.php");
         }
        if (isset($_POST["nusuario"])) {

          $connection = new mysqli($db_host, $db_user, $db_password, $db_name);

          if ($connection->connect_errno) {
              printf("Conexión fallida: %s\n", $connection->connect_error);
              exit();
          }
          $query = $connection->prepare("INSERT INTO usuario (nombre_usuario, pass, nivel_adm,fecha_registro, correo) values(?,md5(?),1,current_date(),?)");
          $query->bind_param("sss",$_POST["nusuario"],$_POST["npass"],$_POST["nmail"]);
          if ($query->execute()) {
               $query->store_result();
              if ($query->affected_rows===0) {
                echo "No fue posible crear usuario";
              } else {
                header("Location: login.php?status=creado");
              }
          } else {
            echo "Wrong Query";
          }
      }
    ?>
      <div class="cabecera"><div id="cabecera1">
          <img src="./img/headphones2.png"><p>Proyecto de Implantación Alvaro Garrido Soto</p></div><div id="cabecera2"><p>Crea una cuenta ya mismo para empezar a utilizar nuestro servicio</p></div>
      </div>
      
      <div class="creaform">
          <div class="formcab">Cuenta nueva</div>
          <div class="formcont">
        <form action="crearusuario.php" method="post">
        
            <p>Usuario: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input name="nusuario" type="text" required></p>
            <p>Contraseña: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input name="npass" type="password" required></p>
            <p>Correo electrónico: &nbsp <input name="nmail" type="email" required></p><br>
            <input type="checkbox" name="acuerdo" value="si" required> Estoy de acuerdo con los términos de uso de servicio**<br>
            <p><input type="submit" value="Enviar"></p>

        </form>
        </div>
      </div>

      <div class="pie"><p><a href="terminos.php">**Aqui podrá encontrar nuestros términos de uso de servicio</a> </p></div>
  </body>
</html>