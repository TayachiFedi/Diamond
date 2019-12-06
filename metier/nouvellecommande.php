<?php
require_once("database.php");
global $db;

if(isset($_POST["libelle"]) && isset($_POST["marque"]) && isset($_POST["prix"]) && isset($_POST["categorie"]) ) {


    if (!empty($db)) {
        $query = $db->prepare("INSERT INTO p (libelle,marque,prix,categorie) VALUES (:libelle,:marque,:prix,:categorie);");

        $query->bindParam(':libelle', $_POST["libelle"]);
        $query->bindParam(':marque', $_POST["marque"]);
        $query->bindParam(':prix', $_POST["prix"]);
        $query->bindParam(':categorie', $_POST["categorie"]);

        print_r($query);
        if ($query->execute())
               header("Location: http://localhost/diamond/administration.php?msg=successenattenteproduit");
        else echo "Erreur lors de l'ajout 1 :(";
        print_r($query->errorInfo());

    } else echo "Probleme de connexion !!!!!!";

}

?>