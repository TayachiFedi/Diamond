<?php
/**
 * Created by PhpStorm.
 * User: Aziz
 * Date: 26/12/2018
 * Time: 00:35
 */

require_once("database.php");
require_once("functions.php");
global $db;

if (amiLoggedIn()){
    $user=getuserData();

    if(!empty($db) && isset($_GET['idcmd'])){
        $query=$db->prepare("DELETE FROM `a` WHERE id = :idcmd");

        $query->bindParam(':idcmd',$_GET['idcmd']);
        if($query->execute()){
                 echo "200";
        }
        else echo "502";
    }
    else echo "Probleme de connexion !";

}

?>
