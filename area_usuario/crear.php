<?php
  session_start();
include_once("../configuracion_bd.php");
  if (!isset($_SESSION["usuario"])) {
              header("Location: ../login.php");
         }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="../librerias/jquery-2.2.0.min.js"></script>
    <script src="../librerias/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
    <script rel="stylesheet" href="../librerias/jquery-ui-1.11.4.custom/jquery-ui.css"></script>
    <title></title>
    <link rel="stylesheet" type="text/css" href="../estilos/general.css">
      <link href='https://fonts.googleapis.com/css?family=Dosis:600' rel='stylesheet' type='text/css'>
  </head>
  <body>
      <div class="cabecera">
          <div id="cabecera1">
          <img src="../img/headphones.png"><p>Creación de la lista</p></div>
          <div id="cabecera2"><p><a href="cierre.php">Cerrar sesión</a> &nbsp &nbsp &nbsp <a href="usuario.php">Volver</a></p></div>
      </div>
     
      <div class="editarlista">
               
                   <form action="accion2.php" method="post">
                       <div class="editn">
                   <p>Nombre de lista: &nbsp &nbsp &nbsp &nbsp &nbsp <input type="text" name="nuevalista" required></p>
                       </div>
                   <div class="incluir">
                       <select name="incluye[]" multiple>
            <!-- -------------------- BLOQUE PARA SACAR TODAS LAS CANCIONES -------------------- -->
            <?php
$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
if ($result3=$connection->query("SELECT * FROM cancion;")) {
     if ($result3->num_rows===0) {
                echo "ERROR FATAL, ABORTAR MISIÓN";
              } else {
         while($obj2 = $result3->fetch_object()) {
                    echo "<option value='".$obj2->id_cancion."'>".substr($obj2->nombre_cancion, 0, -4)." --- ".$obj2->album."</option>";
                 }
         $result3->close();
         unset($obj2);
    }
 }
?>
</select></br></br></br>
                       <input type="submit" value="Crear lista">
                       </div>
                   </form>
               
               </div>
      <div class="pie"><p>Crea tu lista de reproducción ahora mismo, puedes comenzar a añadir canciones ya mismo</p></div>
  </body><?php unset($connection); ?>
</html>