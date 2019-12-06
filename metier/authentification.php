<?php
/**
 * Created by PhpStorm.
 * User: Aziz
 * Date: 03/12/2018
 * Time: 13:54
 */
require_once("./database.php");
require_once("./functions.php");

if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
global $db;

if(isset($_POST["email"]) && isset($_POST["password"])){

    $query=$db->prepare("Select * from u where email = :email AND motdepasse = :password LIMIT 1");
    $query->bindParam(':email',$_POST["email"]);
    $rp=$_POST["password"];
    $up = Rhash($rp);
    $query->bindParam(':password',$up);
    $query->execute();
    $res = $query->fetchAll();
    if($query->execute()){
            $id=$res[0]['id'];
            echo $id;
            $etat=1;
            $datedeconnection=date("Y-m-d h:i:sa");
        $sql = "UPDATE u SET lastconnection=?, connecte=?  WHERE id=?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$datedeconnection,$etat,$id]);

            //$query2=$db->prepare("insert into u (lastconnection,connecte) values (:lastconnection,:connecte) where id=$id");
            //$query2->bindParam(':lastconnection',$datedeconnection);
            //$query2->bindParam(':connecte',$etat);
            //$query2->execute();
    }

    if($query->rowCount()){

        /** Session */

        $_SESSION["user-token"] = Rhash($res[0]["id"]);

        if($res[0]["fonction"] == "administrateur")
         header("Location: http://localhost/diamond/administration.php");
        else if($res[0]["fonction"] == "magasinier")
         header("Location: http://localhost/diamond/magasin.php");
        else {
         header("Location: http://localhost/diamond/vitrine/index.php");
        }
    }
    else{
       header("Location: http://localhost/diamond?msg=error");
    }



}
else {
 echo "base not connected";
}
