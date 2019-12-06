<?php
/**
 * Created by PhpStorm.
 * User: Aziz
 * Date: 25/12/2018
 * Time: 23:26
 */


require_once("../metier/database.php");
require_once("../metier/functions.php");
global $db;

if (amiLoggedIn()){








global $db;
if(!empty($db)){

    $query=$db->prepare("SELECT * FROM a where etat='valide' ;");
    $query->execute();
    $res = $query->fetchAll();

    foreach ($res as $m) {
        $l=$m['id'];
        echo "<tr><td> ".$m['id']." </td><td> ".$m['nom'].' '.$m['prenom']." </td><td> ".$m['libelle']." </td><td> ".$m['tel']." </td><td> ".$m['addresse'].' '.$m['ville'].' '.$m['codepostal']." </td><td> ".$m['prix']." </td><td> ".$m['datelivraison']." </td><td><button type='submit' onclick='deletecom($l)'><span class='fa fa-trash-o'></span></button></td>";

        //echo "<td> ".$m['qte']." </td>";
        $sconfirm ="return confirm('Are you sure you want to delete this item?');";
        echo "</tr>";
    }
}
}
?>