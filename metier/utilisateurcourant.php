<?php
require_once("functions.php");
require_once("database.php");
if(amiLoggedIn()) {$user = getuserData();}
else {
    header("Location: http://localhost");
}
global $db;
if(!empty($db)){
    $varid=$user['id'];
    $query=$db->prepare("Select * from u where id=$varid");
    $query->execute();
    $res = $query->fetchAll();
    foreach ($res as $user) {
        echo "<tr>";
        echo "<td> ".$user['id']." </td>";
        echo "<td> ".$user['nom']." </td>";
        echo "<td> ".$user['prenom']." </td>";
        echo "<td> ".$user['email']." </td>";
        echo "<td> ".$user['fonction']." </td>";
        echo "</tr>";
    }

}
//$passunhash=unhash($user['password']);
?>
<form method="post" action="utilisateurcourantajour.php">
    <div class="fields">
        <div class="field half">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" value="<?php echo$user['nom']?>" required/>
        </div>
        <div class="field half">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" value="<?php echo$user['prenom']?>" required/>
        </div>
        <div class="field half">
            <label for="tel">Telephone</label>
            <input type="text" name="tel" id="tel" value="<?php echo$user['tel']?>" required/>
        </div>
        <div class="field half">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php echo$user['email']?>" required/>
        </div>
    </div>

    <ul class="actions">
        <li><input type="submit" value="update" class="primary" /></li>
        <li><input type="reset" value="Reset" /></li>
    </ul>

</form>
