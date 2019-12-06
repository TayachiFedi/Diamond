<?php
require_once("database.php");
global $db;


if(isset($_REQUEST['btn_insert']) ) {

    if(isset($_POST["libelle"]) && isset($_POST["matiere"]) && isset($_POST["prix"]) && isset($_POST["categorie"]) ) {

        $image_file = $_FILES["txt_file"]["name"];
        $type = $_FILES["txt_file"]["type"]; //file name "txt_file"
        $size = $_FILES["txt_file"]["size"];
        $temp = $_FILES["txt_file"]["tmp_name"];

        if (!empty($db)) {
            $query = $db->prepare("INSERT INTO p (libelle,matiere,prix,categorie,photo) VALUES (:libelle,:matiere,:prix,:categorie,:photo);");

            $query->bindParam(':libelle', $_POST["libelle"]);
            $query->bindParam(':matiere', $_POST["matiere"]);
            $query->bindParam(':prix', $_POST["prix"]);
            $query->bindParam(':categorie', $_POST["categorie"]);
            $query->bindParam(':photo', $image_file);

            print_r($query);
            if ($query->execute())
                header("Location: http://localhost/diamond/administration.php?msg=successenattenteproduit");

            else echo "Erreur lors de l'ajout 1 :(";
            print_r($query->errorInfo());

        } else echo "Probleme de connexion !!!!!!";

    }


    $path = "upload/" . $image_file; //set upload folder path

    if (empty($image_file)) {
        $errorMsg = "Please Select Image";
    } else if ($type == "image/jpg" || $type == 'image/jpeg' || $type == 'image/png' || $type == 'image/gif') //check file extension
    {
        if (!file_exists($path)) //check file not exist in your upload folder path
        {
            if ($size < 5000000) //check file size 5MB
            {
                move_uploaded_file($temp, "upload/" . $image_file); //move upload file temperory directory to your upload folder
            } else {
                $errorMsg = "Your File To large Please Upload 5MB Size"; //error message file size not large than 5MB
            }
        } else {
            $errorMsg = "File Already Exists...Check Upload Folder"; //error message file not exists your upload folder path
        }
    } else {
        $errorMsg = "Upload JPG , JPEG , PNG & GIF File Formate.....CHECK FILE EXTENSION"; //error message file extension
    }



}
