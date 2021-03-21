<!-- Affichage des différents groupes
    Le menu se trouve dans layout/default.php -->

<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'getride');

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Vérifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}

	$username = 'trice@gogl.com';
	
	$_SESSION['mail'] = $username;

	if(!empty($_SESSION['mail'])){
?>

<div class="container">
	<div class="text-center">
		<h1>Mon Groupes d'amis</h1>
	</div>
	
	<!-- Boutton pour ajouter un groupe d'ami !-->
	<a href="AjoutGroupe" role="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>  Creer un nouveau groupe d'amis </a>
	
    <?php
		$admOuMembr = 0;
		// Recherche dans la BDD des groupes
		$idMembre = $conn->query("SELECT idMembre FROM `membre` WHERE mail='".$_SESSION['mail']."'");
		while($i = $idMembre->fetch_assoc()){
			$_SESSION['idMembre'] = $i['idMembre'];
		}
		$groupe = $conn->query("SELECT * FROM `groupemembre` WHERE idUtilisateur='".$_SESSION['idMembre']."'");
		while($donnees = $groupe->fetch_assoc()){
			$admOuMembr++;
			$tabl[] = $donnees['idGroupe'];
		}
		if($admOuMembr == 0){ 
	?>
			<div class="text-center">
			<br><br>
				<div class="p-3 mb-2 bg-info text-white">Aucun groupe d'amis créé !</div>
			</div>
	<?php	
		}
		else{
			
	?>
	
	<!-- Sinon :  -->
		<!-- Boucle pour de :  -->
		<?php 
			foreach($tabl as $element){
				$name = $conn->query("SELECT * FROM `groupe` WHERE idGroupe='".$element."'");
				$nom = $name->fetch_assoc();
		?>
				<p><br></p>
				<div class="panel panel-default">
					<!-- Entete :  -->
					<div class="panel panel-success">
						<div class="panel-heading">
							<?php echo $nom['nom']; ?> 
							<div class="pull-right">
								<div class="dropdown">
									<button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
										<span class="glyphicon glyphicon-menu-hamburger"></span>
									</button>
									<ul class="dropdown-menu" role="menu" >
										<li role="presentation"><a role="menuitem" tabindex="-1" href="#"><span class="glyphicon glyphicon-plus"></span>  Ajouter un ami</a></li>
										<li role="presentation"><a role="menuitem" tabindex="-1" href="#"><span class="glyphicon glyphicon-trash"></span>  Supprimer un ami</a></li>
										<li role="presentation"><a role="menuitem" tabindex="-1" href="#"><span class="glyphicon glyphicon-pencil"></span>  Modifier le groupe</a></li>
										<li role="presentation" class="divider"></li>
										<li role="presentation"><a role="menuitem" tabindex="-1" href="#"><p style="color:#FF0000";>Supprimer le groupe</p></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- Contenu du panneau : -->
					<div class="panel-body">
						<!-- Visualiser la BDD du groupe et afficher les nom et prénom de chaque personne : -->
						<ul>
						<?php
							$groupe = $conn->query("SELECT * FROM `groupemembre` WHERE idGroupe='".$element."'");
							
							while($donnees = $groupe->fetch_assoc()){
								$idUtil = $conn->query("SELECT * FROM `membre` WHERE idMembre='".$donnees['idUtilisateur']."'");
								while($idMemb = $idUtil->fetch_assoc()){

						?>
									<li><?php echo $idMemb['nom']; echo ' '; echo $idMemb['prenom'];?> </li>
						<?php
								}
							}
						?>
						</ul>
					</div>
					<!-- Commentaire donné (optionnel) -->
					<div class="panel-footer">
						<?php 
							if($nom['commentaire'] != 'NULL')
								echo $nom['commentaire']; 
						?> 
					</div>
				</div> 
	<?php
			}
		}
	?>
</div>
<?php
	}
	else{
		//Retour à la page de connexion
	}
?>
