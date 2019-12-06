<?php
/**
 * Created by PhpStorm.
 * User: Aziz
 * Date: 25/12/2018
 * Time: 23:26
 */


require_once("database.php");
require_once("functions.php");
global $db;

if (amiLoggedIn()){
    $user=getuserData();

    if(!empty($db)){
        /*$query=$db->prepare("SELECT a.id as idcommande, idproduit, dateachat, etat,libelle,prix FROM `a`, `p`WHERE a.iduser =:iduser and etat = 'active' and a.idprod = p.id");*/
        $query=$db->prepare("SELECT a.id as idcommande , a.idproduit , a.dateachat, a.etat, a.libelle as libelle, p.prix as prix FROM a,p where a.iduser=:iduser and a.idproduit=p.id and etat='active'");

        $query->bindParam(':iduser',$user['id']);
        if($query->execute()){
            echo"<h2>panier</h2><table><thead><tr><th>Commande</th><th>Produit</th><th>Prix</th><th><span class='fa fa-trash'></span></th></tr></thead><tbody>";
            $res = $query->fetchAll();
            $tot = 0;
            foreach ($res as $row) {
                $currcmd = $row['idcommande'];
                echo "<tr><td>".$row['idcommande']."</td><td>".$row['libelle']."</td><td>".$row['prix']."</td><td><input type='button' value='Supprimer' onclick='deletecmd(".$currcmd.");'/></td></tr>";
                $tot+= $row['prix'];
            }
            echo "</tbody><tfoot><tr><td></td><td></td><td>".$tot."</td><td><input type='button' onclick='validerachat();' value='Valider'></td></tr></tfoot></table>";
        }
    }
    else echo "Probleme de connexion !";

}

?>
