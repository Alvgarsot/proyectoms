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
if (isset($_GET['edit'])){
$_SESSION['sujeto']=$_GET['edit'];
}
$consultita="SELECT * FROM usuario WHERE nivel_adm=1;";
$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
$connection->set_charset("utf8");
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
          <div id="cabecera2"><p><a href="cierre.php">Cerrar sesión</a> &nbsp &nbsp &nbsp <a href="accion2.php?check=1">Volver</a></p></div>
      </div>
     
     <div class="listas">
          <div class="liscab">Listas:</div>
          <div class="liscont">
             <ul class="listausu">
                 
               <?php
             /*       ------------------------------ SACAR LISTAS ----------------------------  */

        if ($result = $connection->query("SELECT * FROM lista join usuario on lista.nombre_usuariofk=usuario.nombre_usuario
            WHERE nombre_usuario='".$_SESSION['sujeto']."';")) {
              if ($result->num_rows===0) {
                echo "<p>No tiene lista</p>";
              } else {
                 while($obj = $result->fetch_object()) {
                     echo "<li><a href='accion2.php?idlista=$obj->id_lista'><img src='../img/borrlist.png'></a><a href='administrarlistas.php?id=$obj->id_lista'> ".$obj->nombre_lista." <span class='fechacr'></span> </a></li>";
                 }
                  $result->close();
                  unset($obj);
              }
          } else {
            echo "Consulta equivocada";
          }
?>
              </ul>
        </div>
      </div>
      <!-- -----------------CANCIONES----------------- -->
      <div class="canciones">
          <div class="cancab">Canciones:</div>
          <div class="cancont2"><?php
/*       ------------------------------ SACAR CANCIONES ----------------------------  */
if (isset($_GET["id"])) {
    $id=$_GET["id"];
        if ($result2 = $connection->query("SELECT * FROM lista , usuario, forma, cancion WHERE lista.nombre_usuariofk=usuario.nombre_usuario AND lista.id_lista=forma.id_listafk AND cancion.id_cancion=forma.id_cancionfk2 AND nombre_usuario='".$_SESSION['sujeto']."' AND id_lista='".$_GET['id']."' ORDER BY num_cancion asc;")) {
              if ($result2->num_rows===0) {
                echo "<p>&nbsp &nbsp &nbsp &nbsp &nbsp Lista vacía</p>";
              } else {
                 while($obj2 = $result2->fetch_object()) {
                     $cancion=array('id2'=>$_GET['id'],'del'=>$obj2->id_cancion);
                     $url=http_build_query($cancion);
                     $url_final="accion2.php?".$url;
                  echo "<li><a href='$url_final'><img src='../img/borrimg.png'></a>&nbsp&nbsp&nbsp-".substr($obj2->nombre_cancion, 0, -4)."<p class='caninfo'>".$obj2->album." - ".$obj2->autor." - ".$obj2->genero." - ".$obj2->duracion."</p></li>";
                 }
                  $result2->close();
                  unset($obj2);
              }
          } else {
            echo "Consulta equivocada";
          }
}
else {
            echo "<p class='formcont'>  Primero elige tu lista de reproducción</p>";
}
 /* ------------------------------------------------------------------------ */
              ?>
        </div>
      </div>
      <div class="pie"><p>En esta zona puedes administrar las listas de reproducción del usuario <?php echo $_SESSION['sujeto']; ?>, pudiendo borrarlas e incluso borrar canciones de sus listas de reproducción</p></div>
  </body><?php  unset($connection); ?>
</html>