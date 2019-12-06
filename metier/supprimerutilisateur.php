<?php
/**
 * Created by PhpStorm.
 * User: Aziz
 * Date: 24/12/2018
 * Time: 23:36
 */

require_once("./../metier/database.php");

global $db;
if(isset($_POST["iduser"])){
    $valeur=$_POST["iduser"];
    $query=$db->prepare("delete from u where id = $valeur ");
    $query->execute();
    header("Location: http://localhost/diamond/datamanager/resourceshumaines.php?msg=supprime");
}