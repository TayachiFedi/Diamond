<?php
require_once ("database.php");
require_once("functions.php");
if(amiLoggedIn()) {$user = getuserData();}
else {
    header("Location: http://localhost");
}
$motdepasseactuelcrypte=$user['password'];
$motdepasseactuelclair=unhash($motdepasseactuelcrypte);
$motdepassesaisit=$_POST['oldpassoword'];
$motdepassenouveau=$_POST['newpassword'];
$motdepasserenouveau=$_POST['rnewpassword'];
if ($motdepasseactuelclair!=$motdepassesaisit);
{
    header("Location: http://localhost/diamond/administration.php#utilisateurcourantmotdepasse?msg=motdepassenonidentiquesancien");
}
if ($motdepassenouveau!=$motdepasserenouveau) {
    header("Location: http://localhost/diamond/administration.php#utilisateurcourantmotdepasse?msg=motdepassenonidentiquesnouveau");
}else{
    $motdepassenouveaucrypte=Rhash($motdepassenouveau);
    if(!empty($db)) {
        $sql = "UPDATE u SET motdepasse=? WHERE id=?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$motdepassenouveaucrypte, $user['id']]);
        print_r($stmt);
        if ($stmt->execute())
            header("Location: http://localhost/diamond/administration.php#utilisateurcourantmotdepasse?msg=miseajouravecsuccess");
        else echo "Erreur lors de l'ajout 1 :(";
        print_r($stmt->errorInfo());

    }else echo "Probleme de connexion !!!!!!";}