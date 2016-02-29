
<?php
  session_start();
include_once("../configuracion_bd.php");
  if (!isset($_SESSION["usuario"])) {
              header("Location: ../login.php");
         }
/* ------------- IMPIDE QUE OTROS USUARIOS EDITEN LISTAS AJENAS Y DE CAMINO GUARDAMOS LISTA------------------- */
if (isset($_GET['id'])) {
    $_SESSION['id']=$_GET['id'];
$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
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
             $result2->close();
            unset($obj);
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
          <div class="editc">
              <p>Selecciona las canciones que deseas añadir a la lista: </p>
              <form action="accion.php" method="post">
        <select name="incluye[]" multiple>
            <!-- -------------------- BLOQUE PARA SACAR TODAS LAS CANCIONES MENOS LAS DE LA LISTA -------------------- -->
            <?php
if ($result3=$connection->query("SELECT * FROM cancion WHERE cancion.id_cancion NOT IN (SELECT id_cancion FROM cancion, forma WHERE cancion.id_cancion=forma.id_cancionfk2 AND id_listafk='".$_GET['id']."');")) {
     if ($result3->num_rows===0) {
                echo "LA LISTA CONTIENE TODAS LAS CANCIONES POSIBLES";
              } else {
         while($obj2 = $result3->fetch_object()) {
                    echo "<option value='".$obj2->id_cancion."'>".substr($obj2->nombre_cancion, 0, -4)." --- ".$obj2->album."</option>";
                 }
         $result3->close();
         unset($obj2);
         
    }
 }
?>
</select>
            <p><input type="submit" value="Añadir canción/es"></p>
</form>
        
        </div>
      <div class="editc2">
          <p>Selecciona las canciones que deseas quitar de la lista: </p>
              <form action="accion.php" method="post">
        <select name="quita[]" multiple>
            <?php
if ($result4=$connection->query("SELECT * FROM cancion, forma WHERE cancion.id_cancion=forma.id_cancionfk2 AND id_listafk='".$_GET['id']."' ORDER BY num_cancion asc;")) {
     if ($result4->num_rows===0) {
                echo "LA LISTA CONTIENE TODAS LAS CANCIONES POSIBLES";
              } else {
         while($obj3 = $result4->fetch_object()) {
                    echo "<option value='".$obj3->id_cancion."'>".substr($obj3->nombre_cancion, 0, -4)." --- ".$obj3->album."</option>";
                 }
         $result4->close();
         unset($obj3);
         
    }
 }
?>
</select>
            </p>
            <p><input type="submit" value="Quitar canción/es"></p>
</form>
        </div>
      <div class="borralista"><a <?php echo "href='accion2.php?idlista=".$_GET['id']."'"; ?>>Borrar lista</a></div>
      </div>
      <div class="pie"><p>Consejo: para seleccionar múltiples canciones, deja pulsada la tecla Crtl a la vez que haces click en cada una de las canciones</p></div>
  </body>
<footer></footer><?php unset($connection); ?>
</html>