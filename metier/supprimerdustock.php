<?php
require_once("./../metier/database.php");

global $db;
if(isset($_POST["iduser"])){
    $valeur=$_POST["iduser"];
        $query=$db->prepare("delete from p where id = $valeur ");
        $query->execute();
        header("Location: http://localhost/diamond/datamanager/gestiondesctock.php?msg=supprime");
   }