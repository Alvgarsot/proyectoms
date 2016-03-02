<?php
session_start();
include_once("../configuracion_bd.php");
$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
$connection->set_charset("utf8");

if (isset($_POST['alcancion'])) {
  if (is_uploaded_file ($_FILES['cancionl']['tmp_name']))
				      {
				            $nombreDirectorio = "../../aver/";
				            $nombreFichero = $_FILES['cancionl']['name'];
				            $copiarFichero = true;
			      }

   if ( $copiarFichero =true) {
$dir_subida = '../../aver/';
$fichero_subido = $dir_subida . $_FILES['cancionl']['name'];
    echo '<pre>';
if (move_uploaded_file($_FILES['cancionl']['tmp_name'], $fichero_subido)) {
    echo "El fichero es válido y se subió con éxito.\n";
} else {
    echo "¡Posible ataque de subida de ficheros!\n";
    print_r($_FILES);
}
    $consultaza="insert into cancion (nombre_cancion, album, anio_salida, autor, genero, duracion) values ('".$_FILES['cancionl']['name']."','".$_POST['alcancion']."','".$_POST['acancion']."','".$_POST['aucancion']."','".$_POST['gencancion']."','".$_POST['durcancion']."')";
    if ($result = $connection->query($consultaza)) {
    
            echo $consultaza;
            }
}
}
header("Location: administrar_canciones.php");
?>