<?php
session_start();
if ($_GET['tema']==="original") {
unset($_SESSION["tema"]);
    $_SESSION["tema"]=array("cabecera","pie","liscab","liscont","listausu","cancab","cancont","editarlista","editn","editc","editc2","cuerpazo","cancont2");
}
if ($_GET['tema']==="oscuro") {
unset($_SESSION["tema"]);
 $_SESSION["tema"]=array("cabecera2","pie2","liscab2","liscont2","listausu2","cancab2","cancontalt","editarlista2","editn2","editc_2","editc2_2","cuerpazo2","cancont2_2");
}



header("location: usuario.php");
?>