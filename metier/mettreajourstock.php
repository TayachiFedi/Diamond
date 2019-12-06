<?php

require_once ("database.php");
require_once("functions.php");
if(amiLoggedIn()) {$user = getuserData();}
else {
    header("Location: http://localhost");
}
global $db;
echo "hello 1";
if(isset($_POST["valeur"]) && isset($_POST["qteupdate"]) ) {
    //$qte=$_POST['qteupdate'];
    //$id=$_POST['submit'];
    echo "hello 2";
    //echo $qte;
    //echo $id;
    echo "hello 3";
    //if(!empty($db)) {
    $sql = "UPDATE p SET qte=? WHERE id=?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$_POST['qteupdate'], $_POST['valeur']]);
    print_r($stmt);
    echo "hello 4";
    if ($stmt->execute())
      header("Location: http://localhost/diamond/datamanager/gestiondesctock.php?msg=ajour");
    else echo "Erreur lors de l'ajout 1 :(";
    print_r($stmt->errorInfo());
    echo "hello 5";
    }else echo "Probleme de connexion !!!!!!";
