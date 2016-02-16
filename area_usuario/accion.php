<?php
session_start();
$connection = new mysqli("localhost", "msadmin", "admin", "msalvaro");
$connection->set_charset("utf8");
/* ------------------ CAMBIAR NOMBRE DE LISTA ----------------- */
 if (isset($_POST["nlista"])) {
          if ($result=$connection->query("UPDATE lista
SET nombre_lista='".$_POST["nlista"]."' WHERE id_lista='".$_SESSION['id']."';")) {
         }
 }
 if (isset($_POST["quita"])) {
for ($x = 0; $x < sizeof($_POST["quita"]); $x++) {
    echo "<p>The number is:". $x." </p>";
}
          }
 if (isset($_POST["incluye"])) {
         
          }
unset($_SESSION['id']);
//header("location: usuario.php");
?>