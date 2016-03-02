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
if (isset($_GET['edit'])) {
    $_SESSION['idcanc']=$_GET['edit'];
}
$consultita2="SELECT * FROM cancion where id_cancion=".$_GET['edit'].";";
$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
 if ($result = $connection->query($consultita2)) {
     if ($result->num_rows===0) {
              echo "<h1>No existe semejante cancion</h1>";
         
              }
            else {
            
            while($obj = $result->fetch_object()){
            $nombre=$obj->nombre_cancion;
            $album=$obj->album;
            $salida=$obj->anio_salida;
            $autor=$obj->autor;
            $genero=$obj->genero;
            $duracion=$obj->duracion;
                }
                $result->close();
                unset($obj);
            }
 }
if (isset($_POST['ncancion'])) {
    $consultita3="update cancion set nombre_cancion='".$_POST['ncancion']."', album='".$_POST['alcancion']."', anio_salida='".$_POST['acancion']."', autor='".$_POST['aucancion']."', genero='".$_POST['gencancion']."', duracion='".$_POST['durcancion']."' where id_cancion='".$_SESSION['idcanc']."'";
    if ($result = $connection->query($consultita3)) {
    
            
            unset($_SESSION['idcanc']);
             header("Location: administrar_canciones.php");
            
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
          <img src="../img/headphones.png"><p>Zona de administración de canciones</p></div>
          <div id="cabecera2"><p><a href="cierre.php">Cerrar sesión</a> &nbsp &nbsp &nbsp <a href="usuario.php">Volver</a></p></div>
      </div>
     
      <div class="tablaadm">
               <form action="editar_cancion.php" method="post">
        
          <p>Nombre de la cancion: <input type='text' name="ncancion" value='<?php echo $nombre; ?>' required></input></p>
          <p>Album: <input type='text' name="alcancion" value='<?php echo $album; ?>'></input></p>
            <p>Año de salida: <input type='number' name="acancion" value='<?php echo $salida; ?>' required></input></p>
            <p>Autor: <input type='text' name="aucancion" value='<?php echo $autor; ?>' required></input></p>
<p>Género: <input type='text' name="gencancion" value='<?php echo $genero; ?>' required></input></p>
<p>Duración: <input type='time' name="durcancion" value='<?php echo $duracion; ?>' step="1" required></input></p>
<p><button value="Enviar" type='submit' name="enviar" >Editar</button> </p>
          </form>
               </div>
      <div class="pie"><p>En esta zona puedes administrar las canciones, pudiendo borrarlas, editarlas y subirlas</p></div>
  </body><?php  unset($connection); ?>
</html>