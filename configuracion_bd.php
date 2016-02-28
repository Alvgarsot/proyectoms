<?php
  //COMPROBAMOS SI ESTAMOS EN OPENSHIFT
  if (isset($_ENV['OPENSHIFT_APP_NAME'])) {
    $db_user=$_ENV['OPENSHIFT_MYSQL_DB_USERNAME']; //Openshift usuario de la bd OPENSHIFT_MYSQL_DB_USERNAME
    $db_host=$_ENV['OPENSHIFT_MYSQL_DB_HOST']; //Openshift bd host OPENSHIFT_MYSQL_DB_HOST
    $db_password=$_ENV['OPENSHIFT_MYSQL_DB_PASSWORD']; //Openshift bd pass OPENSHIFT_MYSQL_DB_PASSWORD
    $db_name="msalvaro"; //Openshift nombre bd
  } else {
    $db_user="msadmin"; //usuario bd local
    $db_host="localhost"; //host bd local
    $db_password="admin"; //pass bd local
    $db_name="msalvaro"; //nombre bd local ("localhost", "msadmin", "admin", "msalvaro");
  }
?>
