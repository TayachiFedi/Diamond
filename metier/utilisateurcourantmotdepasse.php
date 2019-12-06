<?php
/**
 * Created by PhpStorm.
 * User: Aziz
 * Date: 17/12/2018
 * Time: 18:55
 */
require_once("./database.php");
require_once("./functions.php");
if(amiLoggedIn()) {$user = getuserData();}
else {
    header("Location: http://localhost/diamond");
}
echo $user['motdepasse'];
?>

<form method="post" action="utilisateurcourantmotdepasseajour.php">

        <div class="field half">
            <label for="oldpassoword">Ancien Mot De Passe</label>
            <input type="password" name="oldpassoword" id="oldpassoword" required/>
        </div>
        <div class="field half">
            <label for="newpassword">Nouveau Mot De Passe</label>
            <input type="password" name="newpasswor" id="newpasswor" required/>
        </div>
        <div class="field half">
            <label for="rnewpassword">Retaper le Nouveau Mot De Passe</label>
            <input type="password" name="rnewpassword" id="rnewpassword" required/>
        </div>
    </div>

    <ul class="actions">
        <li><input type="submit" value="update" class="primary" /></li>
        <li><input type="reset" value="Reset" /></li>
    </ul>

</form>
