<?php
  session_start();
include_once("../configuracion_bd.php");
/* ----------------------------- NOS ASEGURAMOS DE QUE SOLO ACCEDEN USUARIOS AUTORIZADOS ----------------------- */
  if (!isset($_SESSION["usuario"])) {
              header("Location: ../login.php");
         }
if ($_SESSION["nivel"]===1) {
              header("Location: usuario.php");
         }
$consultita2="SELECT * FROM cancion;";
$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
 if ($result = $connection->query($consultita2)) {
     if ($result->num_rows===0) {
              echo "<h1>No hay ninguna cancion</h1>";
         
              }
            else {
            $z=0;
            while($obj = $result->fetch_object()){
            $idcan[$z]=$obj->id_cancion;
            $ncan[$z]=$obj->nombre_cancion;
                $z++;
                }
                $result->close();
                unset($obj);
            }
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
          <img src="../img/headphones.png"><p>Zona de administración de las canciones</p></div>
          <div id="cabecera2"><p><a href="cierre.php">Cerrar sesión</a> &nbsp &nbsp &nbsp <a href="administracion.php">Volver</a></p></div>
      </div>
     <div class="botoncrear2"><a href="subida_cancion.php">Subir nueva canción</a></div>
      <div class="tablaadm">
               <table>
            <tr><th>Id canción</th><th>Nombre de la canción</th><th>Editar información de la canción</th><th>Borrar canción</th></tr>
                <?php
if (isset($idcan)) {
        for($y=0;$y<sizeof($idcan);$y++){
            echo "<tr>";
            echo "<td>".$idcan[$y]."</td>";
            echo "<td>".$ncan[$y]."</td>";
            echo "<td><a href='editar_cancion.php?edit=$idcan[$y]'><img class='imagen_adm' src='../img/anadir2.png'></a></td>";
            echo "<td><a href='accion2.php?borr2=$idcan[$y]'><img class='imagen_adm' src='../img/borrar.png'></a></td>";
            echo "</tr>";
        }
}
?>
          </table>
               </div>
      <div class="pie"><p>En esta zona puedes administrar las canciones, pudiendo borrarlas, editarlas y subirlas</p></div>
  </body><?php  unset($connection); ?>
</html>