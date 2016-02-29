<?php
session_start();
include_once("../configuracion_bd.php");
$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
$connection->set_charset("utf8");
/* ------------------ CAMBIAR NOMBRE DE LISTA ----------------- */
 if (isset($_POST["nlista"])) {
          if ($result=$connection->query("UPDATE lista
SET nombre_lista='".$_POST["nlista"]."' WHERE id_lista='".$_SESSION['id']."';")) {
         }
 }
/* ------------------ QUITAR CANCIONES DE LA LISTA ----------------- */
 if (isset($_POST["quita"])) {
   foreach ($_POST["quita"] as $z) {
    if($result=$connection->query("DELETE FROM forma
WHERE id_cancionfk2='".$z."' AND id_listafk='".$_SESSION['id']."';")) {
    }
}
}
          /* ------------------ INSERTAR CANCIONES EN LA LISTA ----------------- */
 if (isset($_POST["incluye"])) {
     if ($result2=$connection->query("SELECT max(num_cancion) as maximo FROM forma WHERE id_listafk='".$_SESSION['id']."';")) {
         }
     if ($result2->num_rows===0) {
                echo "Lista vacía";
              } else {
                 while($obj2=$result2->fetch_object()) {
                     $maximo=$obj2->maximo;
                     $contador=$maximo+1;
                     foreach ($_POST["incluye"] as $k) {
    if($result=$connection->query("INSERT INTO forma (id_listafk,id_cancionfk2,num_cancion) values (".$_SESSION['id'].",".$k.",".$contador.");")) {
    $contador++;
    }
                 }
        
}
         $result2->close();
         unset($obj2);
 }
 }
unset($connection);
unset($_SESSION['id']);
header("location: usuario.php");
?>