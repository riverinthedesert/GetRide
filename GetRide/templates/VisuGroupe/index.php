<!-- Affichage des différents groupes
    Le menu se trouve dans layout/default.php -->

<?= $this->Html->css(['ouiounon']) ?>
<?php
	use Cake\Datasource\ConnectionManager;
	$conn = ConnectionManager::get('default');

	$session_active = $this->request->getAttribute('identity');
	if(!is_null($session_active)){
?>

<div class="container">
	<div class="text-center">
		<h1>Mes Groupes d'amis</h1>
	</div>
	
	<!-- Boutton pour ajouter un groupe d'ami !-->
	<a href="AjoutGroupe" role="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>  Creer un nouveau groupe d'amis </a>

	<p1>
	<?php
		$admOuMembr = 0;
		
		foreach($donnees as $don){
			$admOuMembr++;
			$tabl[] = $don['idGroupe'];
		}
	?>
	</p1>

    <?php
		// Recherche dans la BDD des groupes
		
		
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
	
	<table>
	<!-- Sinon :  -->
		<!-- Boucle pour de :  -->
		<?php 

			$i = 0;

			foreach($tabl as $element){
				if($element != 0){

					if ($i % 2 == 0)
						echo "<tr>";

					echo "<td>";
					$i++;

					$name="SELECT * FROM `groupe` WHERE idGroupe=".$element;
					$nom = $conn->execute($name)->fetchAll('assoc');

					/*$name = $conn->query("SELECT * FROM `groupe` WHERE idGroupe='".$element."'");
					$nom = $name->fetch_assoc();*/
			?>
					<p><br></p>
					
					<div class="panel panel-default" style="width:50%">
						<!-- Entete :  -->
						<div class="panel panel-success">
							<div class="panel-heading">
							
								<?php 

								$nomGroupe = $nom[0]['nom'];

								echo "<a href='VisuGroupe/details?idGroupe=$element'><strong>$nomGroupe</strong></a>";
								
								?>
								 
								<div class="pull-right">
									<div class="dropdown">
										<button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
											<span class="glyphicon glyphicon-menu-hamburger"></span>
										</button>
										<ul class="dropdown-menu" role="menu" >
											<li role="presentation"><a role="menuitem" tabindex="-1" <?php echo "href='AjoutMembreGroupe?idGroupe=$element' "?>><span class="glyphicon glyphicon-plus"></span>  Ajouter un ami</a></li>
											<li role="presentation"><a role="menuitem" tabindex="-1" <?php echo "href='SupprimMembre?idGroupe=$element' "?> ><span class="glyphicon glyphicon-trash"></span>  Supprimer un ami</a></li>
											<li role="presentation"><a role="menuitem" tabindex="-1" <?php echo "href='ModifierGroupe?idGroupe=$element' "?> ><span class="glyphicon glyphicon-pencil"></span>  Modifier le groupe</a></li>
											<li role="presentation"><a role="menuitem" tabindex="-1" href=<?php echo "/GetRide/GetRide/VisuGroupe/quitterGroupe/$element"?>><span class="glyphicon glyphicon-remove"></span>  Quitter le groupe</a></li>
											<li role="presentation" class="divider"></li>
											<li role="presentation"><a role="menuitem" tabindex="-1" href=<?php echo "/GetRide/GetRide/VisuGroupe/supprimerGroupe/$element"?>><p style="color:#FF0000";>Supprimer le groupe</p></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!-- Contenu du panneau : -->
						<div class="panel-body"  style="overflow: auto; max-height:300px">
							<!-- Visualiser la BDD du groupe et afficher les nom et prénom de chaque personne : -->
							<ul>
							<?php
								$groupe="SELECT * FROM `groupemembre` WHERE idGroupe=".$element;
								$donnees = $conn->execute($groupe)->fetchAll('assoc');
								
								foreach($donnees as $don){
									$idUtil="SELECT * FROM `users` WHERE idMembre=".$don['idUtilisateur'];
									$idMemb = $conn->execute($idUtil)->fetchAll('assoc');

									//$idUtil = $conn->query("SELECT * FROM `membre` WHERE idMembre='".$don['idUtilisateur']."'");
									foreach($idMemb as $idM){

							?>
										<li><?php echo $idM['nom']; echo ' '; echo $idM['prenom'];?> </li>
							<?php
									}
								}
							?>
							</ul>
						</div>
						<!-- Commentaire donné (optionnel) -->
						<div class="panel-footer">
							<?php 
								if($nom[0]['commentaire'] != 'NULL')
									echo $nom[0]['commentaire']; 
							?> 
						</div>
					</div> 
		<?php
				echo "</td>";

				if ($i % 2 == 0)
					echo "</tr>";
				

				}
			}
		}
	?>
</table>
</div>
<?php
	}
	else{
		//Retour à la page de connexion
	}
?>
