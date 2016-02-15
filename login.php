
<?php
  session_start();
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
        if (isset($_POST["usuario"])) {

          $connection = new mysqli("localhost", "msadmin", "admin", "msalvaro");

          if ($connection->connect_errno) {
              printf("Conexión fallida: %s\n", $connection->connect_error);
              exit();
          }
          $query = $connection->prepare("SELECT * FROM usuario WHERE nombre_usuario=? AND pass=md5(?)");
          $query->bind_param("ss",$_POST["usuario"],$_POST["pass"]);
          if ($query->execute()) {
               $query->store_result();
              if ($query->affected_rows===0) {
                echo "LOGIN INVALIDO";
              } else {
                $_SESSION["usuario"]=$_POST["usuario"];
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
          <img src="./img/headphones2.png"><p>Banner aqui con logo</p></div>
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

      <div class="pie"><p>-----------------------------Rep aqui--------------------------</p></div>
  </body>
</html>