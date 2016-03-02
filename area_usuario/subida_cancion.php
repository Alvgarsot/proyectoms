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
 $copiarFichero = false;
$consultita2="SELECT * FROM cancion where;";
$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
/*
if (isset($_POST['alcancion'])) {
  //  if (is_uploaded_file ($_FILES['cancionl']['tmp_name']))
	//			      {
		//		            $nombreDirectorio = "../../aver/";
		//		            $nombreFichero = $_FILES['cancionl']['name'];
			//	            $copiarFichero = true;
		//	      }

   
$dir_subida = '../../aver/';
$fichero_subido = $dir_subida . basename($_FILES['cancionl']['name']);
    echo '<pre>';
if (move_uploaded_file($_FILES['cancionl']['tmp_name'], $fichero_subido)) {
    echo "El fichero es válido y se subió con éxito.\n";
} else {
    echo "¡Posible ataque de subida de ficheros!\n";
}
    $consultaza="insert into cancion (nombre_cancion, album, anio_salida, autor, genero, duracion) values ('".$_FILES['cancionl']['name']."','".$_POST['alcancion']."','".$_POST['acancion']."','".$_POST['aucancion']."','".$_POST['gencancion']."','".$_POST['durcancion']."')";
    if ($result = $connection->query($consultaza)) {
    
            // move_uploaded_file ($_FILES['cancionl']['tmp_name'],$nombreDirectorio . $nombreFichero);
            // header("Location: administrar_canciones.php");
            echo $consultaza;
            }
   // if ($copiarFichero)
   //    	move_uploaded_file ($_FILES['cancionl']['tmp_name'],$nombreDirectorio . $nombreFichero);
}
*/
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
          <div id="cabecera2"><p><a href="cierre.php">Cerrar sesión</a> &nbsp &nbsp &nbsp <a href="administrar_canciones.php">Volver</a></p></div>
      </div>
     
      <div class="tablaadm">
               <form action="accion3.php" method="post" ENCTYPE="multipart/form-data">
          <p>Album: <input type='text' name="alcancion" value=''></input></p>
            <p>Año de salida: <input type='number' name="acancion" value='' required></input></p>
            <p>Autor: <input type='text' name="aucancion" value='' required></input></p>
<p>Género: <input type='text' name="gencancion" value='' required></input></p>
<p>Duración: <input type='time' name="durcancion" value='' step="1" required></input></p>
<p>Canción a subir: <INPUT TYPE="HIDDEN" NAME="MAX_FILE_SIZE" VALUE="10002400">					
								<input type="file" name="cancionl" value="examinar" required></input></p>
<p><button value="Enviar" type='submit' name="enviar" >Editar</button> </p>
          </form>
               </div>
      <div class="pie"><p>En esta zona puedes administrar las canciones, pudiendo borrarlas, editarlas y subirlas</p></div>
  </body><?php  unset($connection); ?>
</html>