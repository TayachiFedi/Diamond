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
							<span class="icon fa-diamond"></span>
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

								<form method="post" action="metier/logout.php">
                                    <blockquote>
                                    <div class="logo">
                                        <h1 style="color: #00c87c"><span class="icon fa-diamond"></span></h1>
                                    </div>
                                    <h3><?php echo $user["nom"]." ".$user["prenom"] ?></h3>
                                    <h3><?php echo $user["email"] ?></h3>
									<h3><?php echo $user["fonction"] ?></h3>
                                    </blockquote>
									<ul class="actions">
										<li><input type="submit" value="logout" class="primary"  /></li>
										
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
                                            <label for="tel">Telephone</label>
                                            <input type="text" name="tel" id="tel" required/>
                                        </div>
                                        <div class="field half">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" required/>
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

                                        <div class="field">
                                            <select name="fonction" id="fonction">
                                                <option value="" disabled="">fonction</option>
                                                <option value="magasinier">Client</option>
                                                <option value="magasinier">Magasinier</option>
                                                <option value="fournisseur">Fournisseur</option>
                                                <option value="administrateur">Administrateur</option>
                                            </select>
                                        </div>
                                    </div>
                                    <ul class="actions">
                                        <li><input type="submit" value="sign-in" class="primary" /></li>
                                        <li><input type="reset" value="Reset" /></li>
                                    </ul>

                                </form>


								<h2 class="major">clients</h2>

								<h4><a href="#modifierutilisateur">modifier</a></h4>
                                <form method="get" action="../index.php">
								<div class="display">
									<table>
										<thead>
										<tr>
                                            <th>id</th>
											<th>nom</th>
											<th>prenom</th>
											<th>email</th>
                                            <th>fonction</th>
                                            <th>cocher</th>
										</tr>
										</thead>
										<tbody>
                                        <?php
                                        require_once("metier/database.php");

                                        global $db;
                                        if(!empty($db)){

                                            $query=$db->prepare("Select * from u where fonction='client'");
                                            $query->execute();
                                            $res = $query->fetchAll();
                                            foreach ($res as $e) {
                                                echo "<tr>";
                                                echo "<td> ".$e['id']." </td>";
                                                echo "<td> ".$e['nom']." </td>";
                                                echo "<td> ".$e['prenom']." </td>";
                                                echo "<td> ".$e['email']." </td>";
                                                echo "<td> ".$e['fonction']." </td>";
                                                $valeurs[]=$e['id'];
                                                echo "<td><div class='actions'><button type='submit'  value='".$e['id']."' >supprimer</button></div></td>";

                                                echo "</tr>";
                                            }

                                        }

                                        ?>

										<tfoot>
										<tr>
                                            <?php echo "<td> ".$e['id']." </td>";?>
										</tr>
										</tfoot>
									</table>
                                </form>
								</div>
                                <h2 class="major">employes</h2>
                                <h4>Default</h4>
                                <div class="display">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>nom</th>
                                            <th>prenom</th>
                                            <th>email</th>
                                            <th>fonction</th>
                                            <th>cocher</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        require_once("metier/database.php");

                                        global $db;
                                        if(!empty($db)){

                                            $query=$db->prepare("Select * from u where fonction='magasinier' OR fonction='administrateur'");
                                            $query->execute();
                                            $res = $query->fetchAll();
                                            foreach ($res as $e) {
                                                echo "<tr>";
                                                echo "<td> ".$e['id']." </td>";
                                                echo "<td> ".$e['nom']." </td>";
                                                echo "<td> ".$e['prenom']." </td>";
                                                echo "<td> ".$e['email']." </td>";
                                                echo "<td> ".$e['fonction']." </td>";
                                                echo "<td><div class='field half'><input type='checkbox' name='ide[]' value='".$e['id']."' /></div></td>";

                                                echo "</tr>";
                                            }

                                        }

                                        ?>

                                        <tfoot>
                                        <tr>
                                            <?php echo "<td> ".$e['id']." </td>";?>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>


                            </article>

						<!-- Produits -->
							<article id="produits">
								<h2 class="major">Produits</h2>
								<span class="image main"><img src="images/pic03.jpg" alt="" /></span>
                                <form method="post" action="metier/nouvellecommande.php">
                                    <div class="fields">
                                        <div class="field">
                                            <label for="libelle">Libellé</label>
                                            <input type="text" name="libelle" id="libelle" required/>
                                        </div>
                                        <div class="field half">
                                            <label for="marque">Marque</label>
                                            <input type="text" name="marque" id="marque" required/>
                                        </div>
                                        <div class="field half">
                                            <label for="prix">Prix</label>
                                            <input type="text" name="prix" id="prix" required/>
                                        </div>

                                        <div class="field">
                                            <select name="categorie" id="categorie">
                                                <option value="" disabled="">Categorie</option>
                                                <option value="bague">Bague</option>
                                                <option value="colier">Colier</option>
                                                <option value="bouclesdoreilles">Boucles d'oreilles</option>
                                                <option value="montre">Montres</option>
                                                <option value="bracelet">Bracelet</option>

                                            </select>
                                        </div>
                                    </div>
                                    <ul class="actions">
                                        <li><input type="submit" value="ADD" class="primary" /></li>
                                        <li><input type="reset" value="Reset" /></li>
                                    </ul>

                                </form>
                                <h2 class="major">produits disponibles </h2>
                                <h4>Default</h4>
                                <div class="display">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>libelle</th>
                                            <th>marque</th>
                                            <th>prix</th>
                                            <th>categorie</th>
                                            <th>cocher</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        require_once("metier/database.php");

                                        global $db;
                                        if(!empty($db)){

                                            $query=$db->prepare("Select * from p ");
                                            $query->execute();
                                            $res = $query->fetchAll();
                                            foreach ($res as $p) {
                                                echo "<tr>";
                                                echo "<td> ".$p['id']." </td>";
                                                echo "<td> ".$p['libelle']." </td>";
                                                echo "<td> ".$p['marque']." </td>";
                                                echo "<td> ".$p['prix']." </td>";
                                                echo "<td> ".$p['categorie']." </td>";
                                                //echo "<td><div class='field half'><input type='checkbox' name='idp[]' value='".$p['id']."' /></div></td>";

                                                echo "</tr>";
                                            }

                                        }

                                        ?>

                                        <tfoot>
                                        <tr>
                                            <?php echo "<td> ".$e['id']." </td>";?>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>



							</article>

						<!-- commandes -->
						<article id="commandes">
							<h2 class="major">nouvelle commande</h2>
							<span class="image main"><img src="images/pic03.jpg" alt="" /></span>
                            <h2 class="major">commandes en cours</h2>
                            <h4>Default</h4>
                            <div class="display">
                                <table class="alt">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>nom</th>
                                        <th>prenom</th>
                                        <th>email</th>
                                        <th>fonction</th>
                                        <th>cocher</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    require_once("metier/database.php");

                                    global $db;
                                    if(!empty($db)){

                                        $query=$db->prepare("Select * from u");
                                        $query->execute();
                                        $res = $query->fetchAll();
                                        foreach ($res as $c) {
                                            echo "<tr>";
                                            echo "<td> ".$c['id']." </td>";
                                            echo "<td> ".$c['nom']." </td>";
                                            echo "<td> ".$c['prenom']." </td>";
                                            echo "<td> ".$c['email']." </td>";
                                            echo "<td> ".$c['fonction']." </td>";
                                            echo "<a name='idp[]'  ></a>";
                                            //echo "<td><div class='field half'><input type='checkbox' name='idp[]' value='".$c['id']."'></div></td>";

                                            echo "</tr>";
                                        }

                                    }

                                    ?>

                                    <tfoot>
                                    <tr>
                                        <?php echo "<td> ".$e['id']." </td>";?>
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
                                                echo "<td> ".$m['nom'].' '.$m['prénom']." </td>";
                                                echo "<td> ".$m['email']." </td>";
                                                echo "<td> ".$m['date']." </td>";
                                                echo "<td> ".$m['message']." </td>";
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
								<!-- modifierutilisateur -->
								<article id="modifierutilisateur">
									<h2 class="major">Contact</h2>
                                    <form method="post" action="">
                                    <?php
                                    require_once("metier/database.php");

                                    global $db;
                                    if(!empty($db)){

                                        $query=$db->prepare("Select * from u where fonction='client'");
                                        $query->execute();
                                        $res = $query->fetchAll();
                                        foreach ($res as $e) {
                                            echo "<ul>";

                                            echo "<li> ".$e['nom']." </li>";
                                            echo "<li> ".$e['prenom']." </li>";
                                            echo "<li> ".$e['email']." </li>";
                                            echo "<li> ".$e['fonction']." </li>";
                                            echo "<li><input type='checkbox' id='ide[]' value='".$e['id']."' /></li>";

                                            echo "</ul>";
                                        }

                                    }

                                    ?>
                                        <ul class="box small-block-grid-1 medium-block-grid-2 large-block-grid-2">
                                            <li><input type="submit" name="level[Primary]" id="level" class="level" value="1" style="border:2px dotted #00f;display:block;background:#ff0000;"><label>Primary</label></li>
                                            <li><input type="submit" name="level[Upper Secondary]" id="level" class="level" value="3"><label>Upper Secondary</label></li>
                                            <li><input type="checkbox" name="level[University]" id="level" class="level" value="5"><label>University</label></li>
                                            <li><input type="checkbox" name="level[Lower Secondary]" id="level" class="level" value="2"><label>Lower Secondary</label></li>
                                            <li><input type="checkbox" name="level[Pre University]" id="level" class="level" value="4"><label>Pre University</label></li>
                                            <li><input type="checkbox" name="level[Other]" id="level" class="level" value="6"><label>Other</label></li>
                                        </ul>
								<ul class="icons">
									<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="icon fa-github"><span class="label">GitHub</span></a></li>
								</ul>
                                </form>
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
        <script type="text/javascript" charset="utf8" src="assets/js/jquery.dataTables.js"></script>

        <script type="text/javascript">

            $(document).ready(function() {
                $('#membres-table').DataTable();
                $('#administration-table').DataTable();
                $('#evenement-table').DataTable();
                $('#message-table').DataTable();

                /*     //swal confirm
                    document.querySelector('#action-membre').addEventListener('submit', function(e) {
                      var form = this;

                      e.preventDefault(); // <--- prevent form from submitting

                      swal({
                          title: "Sure ?",
                          text: "Voulez-vous valider l'action !",
                              showCancelButton: true,
                              confirmButtonText: "oui",
                               cancelButtonText: "non"
                        }).then((result) => {
                              if (result.value) {
                                form.submit()
                              }
                              else {
                                  swal(
                                  'Annulé !',
                                  'Action annulé',
                                  'error'
                                )
                              }
                            })

                } ); */
            });

        </script>

    </body>
</html>
