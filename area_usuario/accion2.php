<?php
session_start();
$connection = new mysqli("localhost", "msadmin", "admin", "msalvaro");
$connection->set_charset("utf8");

 if (isset($_POST["nuevalista"])) {
    if ($consulta=$connection->query("SELECT max(id_lista) as listanueva from lista")) {
        while ($guarda=$consulta->fetch_object()) {
            $idnuevo=$guarda->listanueva;
            $idnuevo=$idnuevo+1;
             }
        }
     /* ------------------ CAMBIAR NOMBRE DE LISTA ----------------- */
   $consultafinal=  "INSERT INTO lista (id_lista,nombre_usuariofk,nombre_lista, fecha_crea) values (".$idnuevo.",'".$_SESSION['usuario']."','".$_POST['nuevalista']."','".date('Y-m-d')."');";
         if ($result=$connection->query($consultafinal)) {
         }
     /* ------------------ METER CANCIONES EN LA LISTA LISTA ----------------- */
                     $contador=1;
                     foreach ($_POST["incluye"] as $k) {
    if($result=$connection->query("INSERT INTO forma (id_listafk,id_cancionfk2,num_cancion) values (".$idnuevo.",".$k.",".$contador.");")) {
    $contador++;
    }
   }
     header("location: usuario.php");
}
 if (isset($_GET["borr"])) {
     $g=0;
     if ($consulta=$connection->query("SELECT * from lista where nombre_usuariofk='".$_GET['borr']."'")) {
        while ($guarda=$consulta->fetch_object()) {
            $id_lista[$g]=$guarda->id_lista;
            $g++;
             }
         /* ------------------ BORRAR CANCIONES DE SU LISTA PRIMERO (AL NO PONER ON DELETE CASCADE) ----------------- */
         foreach ($id_lista as $z) {
    if($result4=$connection->query("DELETE FROM forma
WHERE id_listafk='".$z."';")) {
    }
}
         /* ------------------ BORRAR LISTA DESPUES (AL NO PONER ON DELETE CASCADE) ----------------- */
         if($result3=$connection->query("DELETE FROM lista
WHERE nombre_usuariofk='".$_GET['borr']."';")) {
    }
         /* ------------------ BORRAR USUARIO ----------------- */
     if($result2=$connection->query("DELETE FROM usuario
WHERE nombre_usuario='".$_GET['borr']."';")) {
    }

 }
     header("location: administracion.php");
 }
 

?>