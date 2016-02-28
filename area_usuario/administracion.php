<?php
  session_start();
/* ----------------------------- NOS ASEGURAMOS DE QUE SOLO ACCEDEN USUARIOS AUTORIZADOS ----------------------- */
  if (!isset($_SESSION["usuario"])) {
              header("Location: ../login.php");
         }
if ($_SESSION["nivel"]===1) {
              header("Location: ../login.php");
         }
$consultita="SELECT * FROM usuario WHERE nivel_adm=1;";
$connection = new mysqli("localhost", "msadmin", "admin", "msalvaro");
 if ($result = $connection->query($consultita)) {
     if ($result->num_rows===0) {
              echo "<h1>No hay ningun usuario</h1>";
         
              }
            else {
            $z=0;
            while($obj = $result->fetch_object()){
            $usuario[$z]=$obj->nombre_usuario;
            $fecha[$z]=$obj->fecha_registro;
            $correo[$z]=$obj->correo;
                $z++;
                }
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
          <img src="../img/headphones.png"><p>Zona de administración</p></div>
          <div id="cabecera2"><p><a href="cierre.php">Cerrar sesión</a> &nbsp &nbsp &nbsp <a href="usuario.php">Volver</a></p></div>
      </div>
     
      <div class="editarlista">
               <table>
            <tr><th>Usuario</th><th>Fecha de registro</th><th>Correo electrónico</th><th>Administrar sus listas</th><th>Borrar usuario</th></tr>
                <?php
if (isset($usuario)) {
        for($y=0;$y<sizeof($usuario);$y++){
            echo "<tr>";
            echo "<td>".$usuario[$y]."</td>";
            echo "<td>".$fecha[$y]."</td>";
            echo "<td>".$correo[$y]."</td>";
            echo "<td><a href='editarlistas.php?edit=$usuario[$y]'><img class='imagen_adm' src='../img/anadir2.png'></a></td>";
            echo "<td><a href='accion2.php?borr=$usuario[$y]'><img class='imagen_adm' src='../img/borrar.png'></a></td>";
            echo "</tr>";
        }
}
?>
          </table>
               </div>
      <div class="pie"><p>En esta zona puedes administrar los usuarios, pudiendo borrarlos e incluso editar sus listas de reproducción</p></div>
  </body>
</html>