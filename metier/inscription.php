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

if(isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["tel"]) && isset($_POST["email"]) && isset($_POST["password"]) ){


    if(!empty($db)){
        $query=$db->prepare("Select email from u where email = :email");
        $query->bindParam(':email',$_POST["email"]);
        $query->execute();
        $res = $query->fetchAll();
        if($query->rowCount()){
            header("Location: http://localhost/diamond/index.php?email=exist");
        }
        else{

            $query=$db->prepare("INSERT INTO u (nom,prenom,sexe,tel,email,motdepasse,fonction,couleur,dateinscription,addresse,codepostal,ville,buycount) VALUES (:nom,:prenom,:sexe,:tel,:email,:motdepasse,:fonction,:couleur,:dateinscription,:addresse,:codepostal,:ville,:buycount);");

            $query->bindParam(':nom',$_POST["nom"]);
            $query->bindParam(':prenom',$_POST["prenom"]);
            $query->bindParam(':sexe',$_POST["sexe"]);
            $query->bindParam(':tel',$_POST["tel"]);
            $query->bindParam(':email',$_POST["email"]);
            $query->bindParam(':motdepasse',Rhash($_POST["password"]));
            $query->bindParam(':couleur',$_POST["couleur"]);

            $dateaujourdhui=date("Y-m-d h:i:sa");
            $query->bindParam(':dateinscription',$dateaujourdhui);
            if (isset($_POST['fonction'])){
                $query->bindParam(':fonction',$_POST['fonction']);

            }else{
                $fonction='client';
                $query->bindParam(':fonction',$fonction);}


            $query->bindParam(':addresse',$_POST["addresse"]);
            $query->bindParam(':codepostal',$_POST["codepostal"]);
            $query->bindParam(':ville',$_POST["ville"]);
            $zero=0;
            $query->bindParam(':buycount',$zero);

            print_r($query);
            if($query->execute())
                header("Location: http://localhost/diamond/index.php?msg=successenattente");
            else echo "Erreur lors de l'ajout 1 :(";
            print_r($query->errorInfo());

        }

    }
    else echo "Probleme de connexion !!!!!!";

}
?>
