<!DOCTYPE html>
<html lang="fr">

<head>
	<title>Se connecter</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Co-Voiturages</a>
			</div>
			<ul class="nav navbar-nav">
				<form class="navbar-form navbar-left" action="/action_page.php">
					<div class="input-group input-group-sm">
						<input type="text" class="form-control" placeholder="Rechercher une personne">
						<div class="input-group-btn">
							<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
						</div>
					</div>
				</form>
				<li><a href="#"><span class="glyphicon glyphicon-list-alt"></span> Afficher les offres</a></li>
				<li><a href="#"><span class="glyphicon glyphicon-plus-sign"></span> Ajouter une offre de trajet</a></li>
				<!-- Notifications : -->
				<li><a href="#" class="glyphicon glyphicon-bell"></a></li>
				<!--<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Mon Profil<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Visualiser son profil</a></li>
            <li><a href="#">Afficher les groupes d'amis</a></li>
            <li><a href="#">Visualiser mes offres</a></li>
			<li><a href="#">Visualiser mes offres en cours</a></li>
          </ul>
        </li>-->
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="Inscription.php"><span class="glyphicon glyphicon-user"></span>S'inscrire</a></li>
				<!-- <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Se connecter</a></li>-->
			</ul>
			<!-- <button class="btn btn-danger navbar-btn">Deconnexion</button> -->
		</div>
	</nav>

	<div class="container">
		<div class="text-center">
			<h1>Connectez-vous</h1>
			<h4>Heureux de vous revoir !</h4>
		</div>
		<br>
		<form action="verifier.php" method="post">
			<label for="email">Adresse e-mail</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>

				<input id="email" type="email" maxlength="50" required title="xxx@yyy.zzz" pattern="^[a-zA-Z0-9]{3,20}@[a-zA-Z]{3,20}\.[a-zA-Z]{2,8}$" class="form-control" name="email" placeholder="exemple@email.com">
			</div>
			<p><span id="erreurAdresse"> &nbsp; </span></p>

			<label for="password">Mot de passe</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>

				<input id="password" type="password" maxlength="30" required title="au moins une majuscule, un chiffre et un caractère spécial" pattern="(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).{8,30}" class="form-control" name="password" placeholder="8-30 caractères">
			</div>
			<p><span id="erreurMdp"> &nbsp; </span></p>
			<p>
				<a href="Recuperation.php">
					<span id="oubli">Mot de passe oublié ?</span>
				</a>
			</p>
	</div>


	<p>

	<div class="text-center">
		<button type="submit" id="envoyer" class="btn btn-default" action="verifier.php">Se connecter</button>
	</div>
	</div>
	</form>



	<div class="text-center">
		<p>
		<div>
			<br>
			<span id="messageCreationCompte"></span>
			</p>
			<p>
				<span id="test"></span>
			</p>
		</div>
	</div>

	<?php
	if (isset($_GET['erreur'])) {
		$err = $_GET['erreur'];

		if ($err === "mail_inconnu") {

	?>

			<script>
				var erreurAdresse = document.getElementById("erreurAdresse");
				erreurAdresse.innerHTML = "Adresse non répertoriée";

				var creationCompte = document.getElementById("messageCreationCompte");
				creationCompte.innerHTML = "";

				var message = "créer un compte";
				var lien = message.link("inscription.php");

				creationCompte.innerHTML = "Nous ne reconnaissons pas vos identifiants. Êtes-vous sûr d'être inscrit chez nous ?" + '<br>' +
					"Vous pouvez toujours " + lien + ", c'est gratuit !";
			</script>

		<?php
		} else if ($err === "mdp")


		?>
		<script>
			var erreurMdp = document.getElementById("erreurMdp");
			erreurMdp.innerHTML = "Mot de passe incorrect";
		</script>

	<?php

}

	?>

</body>

</html>