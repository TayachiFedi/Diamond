<!DOCTYPE HTML>
<?php
require_once("metier/functions.php");
if(amiLoggedIn()) {$user = getuserData();}
else {
    header("Location: http://localhost");
}
?>
<html>
	<head>
		<title>Diamond Administration</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>

	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="logo">
                            <a href="vitrine/index.php"><span class="icon fa-diamond"></span></a>
						</div>
						<div class="content">
							<div class="inner">
								<h1>Diamond</h1>
                            </br><p>Hommage aux magnifiques pierres précieuses taillées à la perfection dans des designs audacieu ces</br>
                                créations illustrent le sens esthétique et le savoir-faire exceptionnel de la Maison romaine.</p>
							</div>
						</div>
						<nav>
							<ul>
								<li><a href="#compte">Compte</a></li>
								<li><a href="#clients">Utilisateurs</a></li>
								<li><a href="#produits">Produits</a></li>
								<li><a href="#commandes">Commandes</a></li>
								<li><a href="#notifications">Notifications</a></li>
							</ul>
						</nav>
					</header>

				<!-- Main -->
					<div id="main">

						<!-- compte -->
							<article id="compte">

                                <h2 class="major">compte</h2>

								    <blockquote>
                                    <div class="logo">
                                        <h1 style="color:<?php echo $user["couleur"] ?>"><span class="icon fa-diamond"></span></h1>
                                    </div>
                                    <h3>Utilisateur :<?php echo " ".$user["nom"]." ".$user["prenom"] ?></h3>
                                    <h3>E-mail :<?php echo " ".$user["email"] ?></h3>
									<h3>Fonction :<?php echo " ".$user["fonction"] ?></h3>
                                    </blockquote>
									<ul class="actions">
                                        <form method="post" action="#utilisateurcourant"><li><input type="submit" value="modifier" /></li></form>
                                        <form method="post" action="#utilisateurcourantmotdepasse"><li><input type="submit" value="changer mot de passe"/></li></form>
                                        <form method="post" action="metier/logout.php"><li><input type="submit" value="logout" class="primary"  /></li></form>
										
									</ul>

								</form>
							</article>

						<!-- clients -->
							<article id="clients">

                                <h2 class="major">Nouvel Utilistaur</h2>

                                <form method="post" action="metier/inscription.php">
                                    <div class="fields">
                                        <div class="field half">
                                            <label for="nom">Nom</label>
                                            <input type="text" name="nom" id="nom" required/>
                                        </div>
                                        <div class="field half">
                                            <label for="prenom">Prénom</label>
                                            <input type="text" name="prenom" id="prenom" required/>
                                        </div>
                                        <div class="field half">
                                            <label for="sexe">sexe</label>
                                            <select name="sexe" id="sexe">
                                                <option value="1" >sexe</option>
                                                <option value="femme">femme</option>
                                                <option value="homme">homme</option>
                                            </select>
                                        </div>
                                        <div class="field half">
                                            <label for="tel">Telephone</label>
                                            <input type="text" name="tel" id="tel" required/>
                                        </div>
                                        <div class="field half">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" required/>
                                        </div>
                                        <div class="field half">
                                            <label for="couleur">Couleur</label>
                                            <input type="color" name="couleur" id="couleur" required/>
                                        </div>
                                        <div class="field half">
                                            <label for="">Password</label>
                                            <input type="password" name="password" id="password" required/>
                                        </div>
                                        <div class="field half">
                                            <label for="retypepassword">Retype Password</label>
                                            <input type="password" name="rpassword" id="rpassword" required/>
                                            <span id="errorpass" style="color: red;"></span>
                                        </div>

                                        <div class="field half">
                                            <label for="fonction">Affectation </label>
                                            <select name="fonction" id="fonction">
                                                <option value="" disabled="">fonction</option>
                                                <option value="magasinier">Client</option>
                                                <option value="magasinier">Magasinier</option>
                                                <option value="fournisseur">Fournisseur</option>
                                                <option value="administrateur">Administrateur</option>
                                            </select>
                                        </div>
                                        <div class="field half">
                                            <label for="addresse">addresse</label>
                                            <input type="text" name="addresse" id="addresse" required/>
                                        </div>
                                        <div class="field half">
                                            <label for="codepostal">codepostal</label>
                                            <input type="text" name="codepostal" id="codepostal" required/>
                                        </div>
                                        <div class="field half">
                                            <label for="ville">ville</label>
                                            <input type="text" name="ville" id="ville" required/>
                                        </div>

                                    </div>
                                    <ul class="actions">
                                        <li><input type="submit" value="sign-in" class="primary" /></li>
                                        <li><input type="reset" value="Reset" /></li>
                                    </ul>

                                </form>


								<h2 class="major">Utilisateurs</h2>
								<h3><span class="icon fa-edit"></span><a href="datamanager/resourceshumaines.php" target="_blank">modifier</a></h3>
                                <div class="display">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th>N° Des Employes <span class="icon fa-user"></th>
                                            <th>N° Des Clients <span class="icon fa-users"></th>
                                            <th>N° Des utilisateurs Connectés <span class="icon fa-globe"></th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                        <?php

                                        require_once("metier/database.php");

                                        global $db;


                                            //$query=$db->prepare("Select count(*) from u where fonction='client'");
                                            //$query->execute();
                                            //$res = $query->fetch();
                                        $count = $db->query("SELECT count(*) FROM u where fonction !='client'")->fetchColumn();
                                        echo "<td> $count </td>";
                                        $count = $db->query("SELECT count(*) FROM u where fonction='client'")->fetchColumn();
                                            echo "<td> $count </td>";
                                        $count = $db->query("SELECT count(*) FROM u where connecte = 1 ")->fetchColumn();
                                        echo "<td> $count </td>";

                                        ?>

                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr>

                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                


                            </article>

						<!-- Produits -->
							<article id="produits">
								<h2 class="major">Produits</h2>
								<span class="image main"><img src="images/pic03.jpg" alt="" /></span>
                                <form method="post" action="metier/nouveauproduit.php" enctype="multipart/form-data">
                                    <div class="fields">
                                        <div class="field">
                                            <label for="libelle">Libellé</label>
                                            <input type="text" name="libelle" id="libelle" required/>
                                        </div>
                                        <div class="field half">
                                            <label for="matiere">Matiere</label>
                                            <select name="matiere" id="matiere">
                                                <option value="" disabled="">Categorie</option>
                                                <option value="or">Or</option>
                                                <option value="plaque">Plaqué</option>
                                                <option value="argent">Argent</option>

                                            </select>
                                        </div>
                                        <div class="field half">
                                            <label for="prix">Prix</label>
                                            <input type="text" name="prix" id="prix" required/>
                                        </div>
                                        <div class="field half">
                                            <label for="categorie">Categorie</label>
                                            <select name="categorie" id="categorie">
                                                <option value="" disabled="">Categorie</option>
                                                <option value="parrure">Parrure</option>
                                                <option value="bague">Bague</option>
                                                <option value="colier">Colier</option>
                                                <option value="bouclesdoreilles">Boucles d'oreilles</option>
                                                <option value="montre">Montres</option>
                                                <option value="bracelet">Bracelet</option>

                                            </select>
                                        </div>
                                        <div class="field half">
                                            <label for="file">Photo</label>
                                            <input type="file" name="txt_file" id="file" required/>
                                        </div>

                                    </div>
                                    <ul class="actions">
                                        <li><input type="submit" name="btn_insert" value="ADD" class="primary" /></li>
                                        <li><input type="reset" value="Reset" /></li>
                                    </ul>

                                </form>
                                <h2 class="major">produits disponibles </h2>
                                <h3><span class="icon fa-edit"></span><a href="datamanager/gestiondesctock.php" target="_blank">modifier</a></h3>
                                <div class="display">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th>en stock<span class="icon fa-edit"></th>
                                            <th>en rupture<span class="icon fa-edit"></th>
                                            <th> bientot en rupture<span class="icon fa-edit"></th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <?php

                                            require_once("metier/database.php");

                                            global $db;


                                            //$query=$db->prepare("Select count(*) from u where fonction='client'");
                                            //$query->execute();
                                            //$res = $query->fetch();
                                            $count = $db->query("SELECT count(*) FROM p where qte>0")->fetchColumn();
                                            echo "<td> $count </td>";
                                            $count = $db->query("SELECT count(*) FROM p where qte=0")->fetchColumn();
                                            echo "<td> $count </td>";
                                            $count = $db->query("SELECT count(*) FROM p where qte>1")->fetchColumn();
                                            echo "<td> $count </td>";

                                            ?>

                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr>

                                        </tr>
                                        </tfoot>
                                    </table>

                                </div>



							</article>

						<!-- commandes -->
						<article id="commandes">
							<h2 class="major">commandes</h2>
                            <h3><span class="icon fa-edit"></span><a href="datamanager/gestiondecommandes.php" target="_blank">Gerer Commandes</a></h3>
                            <h3><span class="icon fa-edit"></span><a href="datamanager/gestiondelivraisons.php" target="_blank">Gerer Livraisons</a></h3>
                            <h4>Default</h4>
                            <div class="display">
                                <table>
                                    <thead>
                                    <tr>
                                        <th>en cours<span class="icon fa-edit"></th>
                                        <th>annulées<span class="icon fa-edit"></th>
                                        <th>archivées<span class="icon fa-edit"></th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <?php

                                        require_once("metier/database.php");

                                        global $db;


                                        //$query=$db->prepare("Select count(*) from u where fonction='client'");
                                        //$query->execute();
                                        //$res = $query->fetch();
                                        $count1 = $db->query("SELECT count(*) FROM a where etat='active'")->fetchColumn();
                                        echo "<td> $count </td>";
                                        $count1 = $db->query("SELECT count(*) FROM a where etat='arrete'")->fetchColumn();
                                        echo "<td> $count </td>";
                                        $count1 = $db->query("SELECT count(*) FROM a where etat='archive'")->fetchColumn();
                                        echo "<td> $count </td>";

                                        ?>

                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>

                                    </tr>
                                    </tfoot>
                                </table>
                            </div>

						</article>

						<!-- notifications -->
							<article id="notifications">
                                <h2 class="major">Notifications</h2>
                                <h4>recentes</h4>
                                <div class="display">
                                    <form>
                                    <table class="alt">
                                        <thead>
                                        <tr>
                                            <th>Nom & prenom</th>
                                            <th>Email</th>
                                            <th>Date</th>
                                            <th>Message</th>
                                            <th>Supprimer</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        require_once("./metier/database.php");

                                        global $db;
                                        if(!empty($db)){

                                            $query=$db->prepare("Select * from m");
                                            $query->execute();
                                            $res = $query->fetchAll();
                                            foreach ($res as $m) {
                                                echo "<tr>";
                                                echo "<td> ".$m['nom'].' '.$m['prenom']." </td>";
                                                echo "<td> ".$m['email']." </td>";
                                                echo "<td> ".$m['date']." </td>";
                                                echo "<td> ".$m['contenu']." </td>";
                                                echo "<td><input type='checkbox' name='iduser[]' value='".$m['id']."' /></td>";
                                                echo "</tr>";
                                            }

                                        }

                                        ?>
                                        </tbody>
                                        <tfoot>

                                        </tfoot>
                                    </table>
                                    </form>
                                </div>

                            </article>
                        <!-- modifier informations utilisateur -->
                        <article id="utilisateurcourant">
                            <h2 class="major"><a href="#compte" class="icon fa-arrow-left"> Back </a></h2>


                            <div class="display">
                                <form method="post" action="metier/utilisateurcourantajour.php">
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
                                        <div class="field">
                                            <label for="addresse">addresse</label>
                                            <input type="text" name="addresse" id="addresse"  value="<?php echo$user['addresse']?>" required/>
                                        </div>
                                        <div class="field half">
                                            <label for="codepostal">codepostal</label>
                                            <input type="text" name="codepostal" id="codepostal" value="<?php echo$user['codepostal']?>" required/>
                                        </div>
                                        <div class="field half">
                                            <label for="ville">ville</label>
                                            <input type="text" name="ville" id="ville"  value="<?php echo$user['ville']?>"  required/>
                                        </div>
                                    </div>

                                    <ul class="actions">
                                        <li><input type="submit" value="update" class="primary" /></li>
                                        <li><input type="reset" value="Reset" /></li>
                                    </ul>

                                </form>

                            </div>

                        </article>

                        <!-- modifier Mot de passe utilisateur -->
                        <article id="utilisateurcourantmotdepasse">
                            <h2 class="major"><a href="#compte" class="icon fa-arrow-left"> Back </a></h2>


                            <div class="display">
                                <form method="post" action="metier/utilisateurcourantmotdepasseajour.php">
                                    <div class="fields">
                                    <div class="field">
                                        <label for="oldpassoword">Ancien Mot De Passe</label>
                                        <input type="password" name="oldpassoword" id="oldpassoword" required/>
                                    </div>
                                    <div class="field half">
                                        <label for="newpassword">Nouveau Mot De Passe</label>
                                        <input type="password" name="newpassword" id="newpassword" required/>
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


                    </div>

                        </article>

				<!-- Footer -->
					<footer id="footer">
						<p class="copyright">&copy; Diamond. Design: Aziz Belkhodja.</p>
					</footer>

			</div>

		<!-- BG -->
			<div id="bg">
				
			

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>




    </body>
</html>