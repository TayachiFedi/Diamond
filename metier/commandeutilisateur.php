<?php
/**
 * Created by PhpStorm.
 * User: Aziz
 * Date: 25/12/2018
 * Time: 22:27
 * //$query=$db->prepare("INSERT INTO `c`(`idprod`, `iduser`, `etat`) VALUES
(:idprod,:iduser,:etat);");
 */

require_once("database.php");
require_once("functions.php");
global $db;




if(isset($_GET["idprod"]) ) {
    if (amiLoggedIn()) {
        $user = getuserData();
    }
    if (!empty($db)) {
        $prodid = $_GET['idprod'];

        $query2 = $db->prepare("select * from p where id=:prodid LIMIT 1");
        $query2->bindParam(':prodid',$prodid);
        $query2->execute();
        $res = $query2->fetchAll();

            $nomproduit = $res[0]['libelle'];
            $prixproduit = $res[0]['prix'];
    }


    if (!empty($db)) {
        $query = $db->prepare("INSERT INTO `a`( `iduser`, `nom`, `prenom`, tel, `idproduit`, `libelle`, `prix`, `addresse`, `codepostal`, `ville`, `datelivraison`, `etat`)
                                                VALUES (:iduser ,:nom, :prenom, :tel ,:idproduit,:libelle,:prix, :addresse, :codepostal,:ville, :datelivraison, :etat)");
        $query->bindParam(':iduser', $user['id']);
        $query->bindParam(':nom', $user['nom']);
        $query->bindParam(':prenom', $user['prenom']);
        $query->bindParam(':tel', $user['tel']);
        $query->bindParam(':idproduit', $prodid);
        $query->bindParam(':libelle', $nomproduit);
        $query->bindParam(':prix', $prixproduit);
        $query->bindParam(':addresse', $user['addresse']);
        $query->bindParam(':codepostal', $user['codepostal']);
        $query->bindParam(':ville', $user['ville']);
        $dateliv = $NewDate=Date('d/m/y', strtotime("+3 days"));
        $query->bindParam(':datelivraison', $dateliv);
        $etat_temp = "active";
        $query->bindParam(':etat', $etat_temp);


        if ($query->execute()) {
            echo "200";
        } else {
            echo "401";
        }
    } else echo "Probleme de connexion !!!!!!";

}
