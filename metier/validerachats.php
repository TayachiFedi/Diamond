<?php
/**
 * Created by PhpStorm.
 * User: Aziz
 * Date: 26/12/2018
 * Time: 00:59
 */

require_once("database.php");
require_once("functions.php");
global $db;

if (amiLoggedIn()){
    $user=getuserData();

    if(!empty($db)){
        $query=$db->prepare("update a set etat='valide' where iduser=:iduser");

        $query->bindParam(':iduser',$user['id']);
        if($query->execute()){
                 echo "200";
        }
        else echo "502";
    }
    else echo "Probleme de connexion !";

}

?>
