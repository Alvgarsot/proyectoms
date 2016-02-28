
<?php
  session_start();
  include("../configuracion_bd.php");
unset($_SESSION['id']);
// ----------------- PARA LA LISTA DE REPRODUCCION       -----------------------
                  if (isset($_GET['cancion'])) {
$connection3 = new mysqli($db_host, $db_user, $db_password, $db_name);
    $connection3->set_charset("utf8");
                      $r=0;
                      $j=0;
    $siguiente_cancion[0]="ASEREJE";
        if ($result3 = $connection3->query("SELECT nombre_cancion FROM lista , usuario, forma, cancion WHERE lista.nombre_usuariofk=usuario.nombre_usuario AND lista.id_lista=forma.id_listafk AND cancion.id_cancion=forma.id_cancionfk2 AND num_cancion>(SELECT num_cancion FROM lista , usuario, forma, cancion WHERE lista.nombre_usuariofk=usuario.nombre_usuario AND lista.id_lista=forma.id_listafk AND cancion.id_cancion=forma.id_cancionfk2 AND nombre_cancion='".$_GET['cancion']."' AND nombre_usuario='".$_SESSION['usuario']."' AND id_lista='".$_GET['id']."') AND nombre_usuario='".$_SESSION['usuario']."' AND id_lista='".$_GET['id']."' ORDER BY num_cancion asc;")) {
              if ($result3->num_rows===0) {
              } else {
                   while($obj3 = $result3->fetch_object()) {
                     $siguiente_cancion[$r]=$obj3->nombre_cancion;
                       $r++;
                        
                 }
                 
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
      <!-- --------------------SCRIPT PARA PLAYLIST AUTOPLAY---------------------------- -->
       <script type="text/javascript">
function setup() {
    var k=0;
    var siguiente= <?php echo json_encode($siguiente_cancion); ?>;
    audioPlayer = document.getElementById('audio');
    document.getElementById('audio').addEventListener('ended', function(){
        audioPlayer.src ="../../aver/"+ siguiente[k];
        audioPlayer.load();
        audioPlayer.play();
        k=k+1;
        }, false);

}
</script>
  </head>
  <body onLoad="setup();">

    <!--  ----------------------CABECERA---------------------- -->
      <div class="cabecera">
        <div id="cabecera1"><img src="../img/headphones.png"><p><?php echo "BIENVENIDO ".strtoupper($_SESSION["usuario"]);
           ?></p></div>
          <div id="cabecera2"><p><a href="cierre.php">Cerrar sesión</a><?php if($_SESSION['nivel']==0) { 
               echo "&nbsp &nbsp &nbsp <a href='administracion.php'>Ir a la zona de administración</a>";
           } ?></p></div>
      </div>
      <div class="nuevalista"><a href="crear.php">CREAR LISTA NUEVA</a></div>
      <!-- --------------LISTAS---------------- -->
      <div class="listas">
          <div class="liscab">Listas:</div>
          <div class="liscont">
             <ul class="listausu">
               <?php
        if (!isset($_SESSION["usuario"])) {
          header("location: ../login.php");
          }
             $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
$connection->set_charset("utf8");
        if ($result = $connection->query("SELECT * FROM lista join usuario on lista.nombre_usuariofk=usuario.nombre_usuario
            WHERE nombre_usuario='".$_SESSION['usuario']."';")) {
              if ($result->num_rows===0) {
                echo "<p>No tiene lista</p>";
              } else {
                 while($obj = $result->fetch_object()) {
                     echo "<li><a href='editar.php?id=$obj->id_lista'><img src='../img/lista.png'></a><a href='usuario.php?id=$obj->id_lista'> ".$obj->nombre_lista." <span class='fechacr'></span> </a></li>";
                 }
              }
          } else {
            echo "Consulta equivocada";
            var_dump($result);
          }
?>
              </ul>
        </div>
      </div>
      <!-- -----------------CANCIONES----------------- -->
      <div class="canciones">
          <div class="cancab">Canciones:</div>
          <div class="cancont"><?php
/*       ------------------------------ SEGUNDA CONSULTA ----------------------------  */
if (isset($_GET["id"])) {
    $id=$_GET["id"];
        if ($result2 = $connection->query("SELECT * FROM lista , usuario, forma, cancion WHERE lista.nombre_usuariofk=usuario.nombre_usuario AND lista.id_lista=forma.id_listafk AND cancion.id_cancion=forma.id_cancionfk2 AND nombre_usuario='".$_SESSION['usuario']."' AND id_lista='".$_GET['id']."' ORDER BY num_cancion asc;")) {
              if ($result2->num_rows===0) {
                echo "<p>&nbsp &nbsp &nbsp &nbsp &nbsp Lista vacía</p>";
              } else {
                 while($obj2 = $result2->fetch_object()) {
/* --------------------COMO PASAR MULTIPLES GETS CONSECUTIVOS ---------------- */
                     $cancion=array('id'=>$_GET['id'],'cancion'=>$obj2->nombre_cancion);
                     $url=http_build_query($cancion);
                     $url_final="usuario.php?".$url;
                    echo "<li><a href='$url_final'><img src='../img/play.png'></a>&nbsp&nbsp&nbsp-".substr($obj2->nombre_cancion, 0, -4)."<p class='caninfo'>".$obj2->album." - ".$obj2->autor." - ".$obj2->genero." - ".$obj2->duracion."</p></li>";
                 }
              }
          } else {
            echo "Consulta equivocada";
            var_dump($result2);
          }
}
else {
            echo "<p class='formcont'>  Primero elige tu lista de reproducción</p>";
}
 /* ------------------------------------------------------------------------ */
              ?>
        </div>
      </div>
      <div class="pie"><?php
/* ---------------------------------------- REPRODUCTOR -------------------- */
if (isset($_GET["cancion"])) {           
echo "<audio id='audio' src='../../aver/".$_GET['cancion']."' controls='controls' autoplay><p>Este navegador es compatible con nuestro reproductor de música, rogamos lo intente de nuevo en otro navegador</p></audio>";
              } else { 
    echo "<p>Indica la canción que deseas reproducir pulsando el botón de Play y aquí aparecerá el reproductor de música</p>";
}
          ?></div>
  </body>
</html>