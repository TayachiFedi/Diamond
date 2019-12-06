


<?php
/**
 * Created by PhpStorm.
 * User: Aziz
 * Date: 03/12/2018
 * Time: 15:53
 */

require_once("database.php");
require_once("functions.php");
global $db;
if(amiLoggedIn()){$user=getuserData();}
if(isset($_POST["message"]) ){


    if(!empty($db)){


            $query=$db->prepare("INSERT INTO m (nom,prenom,email,contenu) VALUES (:nom,:prenom,:email,:contenu);");
            $query->bindParam(':nom', $user['nom']);
            $query->bindParam(':prenom', $user['prenom']);
            $query->bindParam(':email', $user['email']);
            $query->bindParam(':contenu', $_POST["message"]);

            if($query->execute())
                header("Location: http://localhost/diamond/vitrine/index.php?msg=successenattente");
            else echo "Erreur lors de l'ajout 1 :(";
            print_r($query->errorInfo());



    }
    else echo "Probleme de connexion !!!!!!";
}

?>
