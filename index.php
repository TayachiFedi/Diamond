<!DOCTYPE HTML>

<html>
	<head>
		<title>Diamond</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		 
	</head>
	<body class="is-preload" >

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
								<p>La bijouterie de luxe en ligne </p>
							</div>
						</div>
						<nav>
							<ul>
								<li><a href="#login">login</a></li>
								<li><a href="#sign-in">sign-in</a></li>
                                <!--<li><a href="#elements">Elements</a></li>-->
								<!--<li><a href="#about">About</a></li>-->
								<li><a href="#contact">Contact</a></li>

							</ul>
						</nav>
					</header>

				<!-- Main -->
					<div id="main">

						<!-- login -->
							<article id="login">
								<h2 class="major">login</h2>
								
								
								<form method="post" action="metier/authentification.php">
									<div class="fields">
										<div class="field half">
											<label for="email">Email</label>
											<input type="text" name="email" id="email" required/>
										</div>
										<div class="field half">
											<label for="password">Password</label>
											<input type="password" name="password" id="password" required/>
										</div>
										
									</div>
									<ul class="actions">
										<li><input type="submit" value="login" class="primary" /></li>
										
									</ul>
								</form>
							</article>

						<!-- inscription -->
							<article id="sign-in">
								<h2 class="major">inscription</h2>
								
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
                                            <label for="couleur">Couleur</label>
                                            <input type="color" name="couleur" id="couleur" required/>
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
							</article>

						<!-- About -->
							<article id="about">
								<h2 class="major">About</h2>
                                <p>une application de gestion de stock cree dans le cadre d'un projet de developpment multimedia</p>
                                <span class="image main"><img src="images/pic03.jpg" alt="" /></span>
								<span class="image main"><img src="images/pic03.jpg" alt="" /></span>
							</article>

						<!-- Contact -->
							<article id="contact">
								<h2 class="major">Contact</h2>
								<form method="post" action="metier/nouveaumessage.php">
									<div class="fields">
										<div class="field half">
											<label for="name">Name</label>
											<input type="text" name="name" id="name" />
										</div>
										<div class="field half">
											<label for="email">Email</label>
											<input type="text" name="email" id="email" />
										</div>
										<div class="field">
											<label for="message">Message</label>
											<textarea name="message" id="message" rows="4"></textarea>
										</div>
									</div>
									<ul class="actions">
										<li><input type="submit" value="Send Message" class="primary" /></li>
										<li><input type="reset" value="Reset" /></li>
									</ul>
								</form>
								<ul class="icons">
									<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="icon fa-github"><span class="label">GitHub</span></a></li>
								</ul>
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
            <script>
                if ('addEventListener' in window) {
                    window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-loading\b/, ''); });
                    document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
                }

                function check(){
                    var result = true;

                    if(document.getElementById("password").value == "" || (document.getElementById("password").value != document.getElementById("rpassword").value ))
                    {
                        result = false;
                        document.getElementById("errorpass").innerHTML = "Error";

                    }
                    else{
                        document.getElementById("errorpass").innerHTML = "";
                    }

                    return result;
                }
            </script>

	</body>
</html>
