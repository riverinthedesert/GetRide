<!-- Affichage des différents groupes
    Le menu se trouve dans layout/default.php -->

<div class="container">
	<div class="text-center">
		<h1>Mon Groupes d'amis</h1>
	</div>
	
	<!-- Boutton pour ajouter un groupe d'ami !-->
	<button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>  Creer un nouveau groupe d'amis </button>
	
    <?php
	// Recherche dans la BDD des Groupes
	// Si la bbd de la personne connecté est vide : 
    if(!empty($_SESSION['login']))
    {
        
    }
    //si elle n'est pas vide
    else
    {
    
    }
 
?>
	<div class="text-center">
	<br><br>
		<div class="p-3 mb-2 bg-info text-white">Aucun groupe d'amis créé !</div>
	</div>
	
	<!-- Sinon :  -->
		<!-- Boucle pour de :  -->
		<br>
		<div class="panel panel-default">
			<!-- Entete :  -->
			<div class="panel panel-success">
				<div class="panel-heading">
					Nom du groupe 
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
					<li>NOM Prenom</li>
					<li>NOM2 Prenom2</li>
					<li>NOM3 Prenom3</li>
					<li>NOM4 Prenom4</li>
					<li>NOM5 Prenom5</li>
					<li>NOM6 Prenom6</li>
				</ul>
			</div>
			<!-- Commentaire donné (optionnel) -->
			<div class="panel-footer">C'est le meilleur groupe !</div>
		</div> 
	
</div>

