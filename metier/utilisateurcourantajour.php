<?php
/**
 * Created by PhpStorm.
 * User: Aziz
 * Date: 03/12/2018
 * Time: 13:54
 */
require_once("./database.php");
require_once("./functions.php");
if(amiLoggedIn()) {$user = getuserData();}
else {
    header("Location: http://localhost/diamond");
}

echo $user['id'];
echo $_POST['nom'];
echo $_POST['prenom'];
echo $_POST['email'];
echo $_POST['tel'];

if(!empty($db)) {
    $sql = "UPDATE u SET nom=?, prenom=?, email=?, tel=?, addresse=?, codepostal=?, ville=? WHERE id=?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['tel'], $_POST['addresse'], $_POST['codepostal'], $_POST['ville'], $user['id']]);
    print_r($stmt);
    if ($stmt->execute())
        header("Location: http://localhost/diamond/administration.php?msg=miseajouravecsuccess");
    else echo "Erreur lors de l'ajout 1 :(";
    print_r($stmt->errorInfo());

}else echo "Probleme de connexion !!!!!!";






