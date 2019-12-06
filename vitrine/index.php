<?php
require_once("../metier/functions.php");
if(amiLoggedIn()) {$user = getuserData();}
else {
    header("Location: http://localhost");
}
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Diamond</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
        <link rel="stylesheet" href="../assets/css/notie.min.css"/>
        <script src="../assets/js/notie.min.js"></script>
        <script type="application/javascript" src="../metier/js/achat.js"></script>

	</head>
	<body class="is-preload" onload="requestcaddy();>
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="index.html"><strong>DIAMOND</strong> Welcome</a></h1>
						<nav>
							<ul>
								<li><a href="#footer" class="icon fa-info-circle">PLUS</a></li>
							</ul>
						</nav>
					</header>

                <!--Main-->
					<div id="main">
                        <!-- <article class="thumb" style="background-color: #1F2224">
							<span style="color:<?php echo $user["couleur"] ?>;font-size: 7em;padding-left: 0.17em;" class="icon fa-diamond"></span>
                            <h3 style="padding-left: 0.5em"><?php echo " ".$user["nom"]." ".$user["prenom"] ?></h3>
                            <h3 style="padding-left: 0.5em"><?php echo " ".$user["email"] ?></h3>


						</article>-->
                        <?php
                        require_once("../metier/database.php");

                        global $db;
                        if(!empty($db)) {

                            $query = $db->prepare("Select * from p");
                            $query->execute();
                            $res = $query->fetchAll();
                            if ($res) {
                                foreach ($res as $m) {
                                    echo "<article class=\"thumb\">";
                                    $nomphoto = "../metier/upload/" . $m['photo'];
                                    echo "<a href='$nomphoto' class='image'><img src='$nomphoto'  /></a>";
                                    echo "<h2>" . $m['libelle'] . "</h2>";
                                    $in="<input type='button' onclick='acheter(".$m['id'].")' value='acheter'>";
                                    echo "<p>fait en " . $m['matiere'] . " au prix de  " . $m['prix']."</br>";
                                    echo "</br>";
                                    echo $in."</p>";

                                    echo "</article>";
                                }

                            } else {
                                echo "<h1 align='center'>La boutique est vide, revenez plus tard</h1>";
                            }
                        }
                        ?>



					</div>

				<!-- Footer -->
					<footer id="footer" class="panel">
						<div class="inner split">
							<div>
								<section id="panier">

								</section>

								<p class="copyright">
									&copy; Diamond. Design: <a href="">HTML5 UP</a>.
								</p>
							</div>
							<div>
								<section>
									<h2>Une reclamation?</h2>
									<form method="post" action="../metier/reclamation.php">
										<div class="fields">

											<div class="field">
												<textarea name="message" id="message" rows="3" placeholder="Message"></textarea>
											</div>
										</div>
										<ul class="actions">
											<li><input type="submit" value="envoyer" class="primary" /></li>
											<li><input type="reset" value="effacer" /></li>
										</ul>
									</form>
								</section>
                                <section>
                                    <h2>Suivez nous ...</h2>
                                    <ul class="icons">
                                        <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                                        <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                                        <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                                        <li><a href="#" class="icon fa-github"><span class="label">GitHub</span></a></li>
                                        <li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
                                        <li><a href="#" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li>
                                    </ul>
                                </section>
                                <p class="copyright">
                                    &copy; Design: <a href="">Belkhodja</a>.
                                </p>
							</div>
						</div>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>