
<?php
  session_start();
  if (!isset($_SESSION["usuario"])) {
              header("Location: ../login.php");
         }
/* ------------- IMPIDE QUE OTROS USUARIOS EDITEN LISTAS AJENAS Y DE CAMINO GUARDAMOS LISTA------------------- */
if (isset($_GET['id'])) {
    $_SESSION['id']=$_GET['id'];
$connection = new mysqli("localhost", "msadmin", "admin", "msalvaro");
    $connection->set_charset("utf8");
    if ($result2=$connection->query("SELECT * FROM lista join usuario on lista.nombre_usuariofk=usuario.nombre_usuario
            WHERE nombre_usuario='".$_SESSION['usuario']."' AND id_lista='".$_GET['id']."';")) {
     if ($result2->num_rows===0) {
                echo "No tiene acceso a la lista";
            header("Location: usuario.php");
              } else {
         while($obj = $result2->fetch_object()) {
                    $nlista=$obj->nombre_lista;
                                                }
                    }
                                }
                    } else {
            echo "Consulta equivocada";
         header("Location: usuario.php");
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
          <img src="../img/headphones.png"><p>Edición de la lista <?php 
echo $nlista; 
?></p></div>
          <div id="cabecera2"><p><a href="cierre.php">Cerrar sesión</a> &nbsp &nbsp &nbsp <a href="usuario.php">Volver</a></p></div>
      </div>
     
      <div class="editarlista">
               <div class="editn">
                   <form action="accion.php" method="post">
                   <p>Nuevo nombre de lista: &nbsp &nbsp &nbsp &nbsp &nbsp <input type="text" name="nlista" required> &nbsp &nbsp &nbsp &nbsp <input type="submit" value="Renombrar lista"></p>
                   </form>
               </div>
               </div>
      <div class="pie"><p>Crea tu lista de reproducción ahora mismo, puedes comenzar a añadir canciones ya mismo</p></div>
  </body>
</html>