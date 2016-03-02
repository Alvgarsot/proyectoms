<?php
session_start();
include_once("../configuracion_bd.php");
$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
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


/* ------------------ BORRAR LISTA DE REPRODUCCION A UN USUARIO DESDE ADMINISTRACION ----------------- */
if (isset($_GET["idlista"])) {
 if ($consulta=$connection->query("DELETE FROM forma WHERE id_listafk=".$_GET['idlista'].";")) {
    }
    if ($consulta=$connection->query("DELETE FROM lista WHERE id_lista=".$_GET['idlista'].";")) {
    }
    if ($_SESSION['nivel']==1){
   header('location: usuario.php');
    }else{
        header('location: administracion.php');
    }
}

/* ------------------ BORRAR CANCION A UN USUARIO DESDE ADMINISTRACION ----------------- */
if (isset($_GET["del"])) {
 if ($consulta=$connection->query("DELETE FROM forma WHERE id_listafk=".$_GET['id2']." AND id_cancionfk2=".$_GET['del'].";")) {
        
    }
   header('location: administrarlistas.php');
}
/* ------------------ PARA BORRAR USUARIO ----------------- */
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
         /* ------------------ BORRAR LISTAS DESPUES (AL NO PONER ON DELETE CASCADE) ----------------- */
         if($result3=$connection->query("DELETE FROM lista
WHERE nombre_usuariofk='".$_GET['borr']."';")) {
    }
         /* ------------------ BORRAR USUARIO ----------------- */
     if($result2=$connection->query("DELETE FROM usuario
WHERE nombre_usuario='".$_GET['borr']."';")) {
    }
header("location: administracion.php");
 }
     
 }
if (isset($_GET["borr2"])) {
         /* ------------------ BORRAR CANCIONES DE SU LISTA PRIMERO (AL NO PONER ON DELETE CASCADE) ----------------- */
        
    if($result4=$connection->query("DELETE FROM forma
WHERE id_cancionfk2='".$_GET["borr2"]."';")) {
    
}
         /* ------------------ BORRAR CANCIONES DESPUES (AL NO PONER ON DELETE CASCADE) ----------------- */
         if($result3=$connection->query("DELETE FROM cancion
WHERE id_cancion='".$_GET['borr2']."';")) {
    }
       header("location: administrar_canciones.php");

 }
     
 
 if (isset($_GET["check"])) {
    unset($_SESSION['sujeto']);
     header("location: administracion.php");
 } 
 
?>