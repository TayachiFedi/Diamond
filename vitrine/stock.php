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
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="index.html"><strong>DIAMOND</strong> Welcome</a></h1>
						<nav>
							<ul>
								<li><a href="#footer" class="icon fa-info-circle">About</a></li>
							</ul>
						</nav>
					</header>

                <!--Main-->
					<div id="main">
                        <form method="post" action="../metier/supprimerdustock.php">
                            <table >

                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Libelle</th>
                                    <th>Matiere</th>
                                    <th>Categorie</th>
                                    <th>Prix</th>
                                    <th>Quantité en Stock</th>
                                    <th>Modifications</th>
                                </tr>
                                </thead>
                                <tbody>


                                <?php
                                require_once("./../metier/database.php");

                                global $db;
                                if(!empty($db)){

                                    $query=$db->prepare("Select * from p");
                                    $query->execute();
                                    $res = $query->fetchAll();
                                    foreach ($res as $m) {
                                        echo "<tr>";
                                        echo "<td> ".$m['id']." </td>";
                                        echo "<td> ".$m['libelle']." </td>";
                                        echo "<td> ".$m['matiere']." </td>";
                                        echo "<td> ".$m['categorie']." </td>";
                                        echo "<td> ".$m['prix']." </td>";
                                        echo "<td> ".$m['qte']." </td>";
                                        echo '<td> <input type="checkbox" id="scales" name="scales" checked></td>';
                                        echo "</tr>";
                                    }

                                }

                                ?>
                                </tbody>

                            </table>
                            </br></form>
					</div>

				<!-- Footer -->
					<footer id="footer" class="panel">
						<div class="inner split">
							<div>
								<section>
									<h2>Magna feugiat sed adipiscing</h2>
									<p>Nulla consequat, ex ut suscipit rutrum, mi dolor tincidunt erat, et scelerisque turpis ipsum eget quis orci mattis aliquet. Maecenas fringilla et ante at lorem et ipsum. Dolor nulla eu bibendum sapien. Donec non pharetra dui. Nulla consequat, ex ut suscipit rutrum, mi dolor tincidunt erat, et scelerisque turpis ipsum.</p>
								</section>
								<section>
									<h2>Follow me on ...</h2>
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
									&copy; Unttled. Design: <a href="http://html5up.net">HTML5 UP</a>.
								</p>
							</div>
							<div>
								<section>
									<h2>Get in touch</h2>
									<form method="post" action="#">
										<div class="fields">
											<div class="field half">
												<input type="text" name="name" id="name" placeholder="Name" />
											</div>
											<div class="field half">
												<input type="text" name="email" id="email" placeholder="Email" />
											</div>
											<div class="field">
												<textarea name="message" id="message" rows="4" placeholder="Message"></textarea>
											</div>
										</div>
										<ul class="actions">
											<li><input type="submit" value="Send" class="primary" /></li>
											<li><input type="reset" value="Reset" /></li>
										</ul>
									</form>
								</section>
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