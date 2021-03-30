<?php 
	session_start(); 
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'getride');
	$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
	// Vérifier la connexion
	if($conn === false){
		die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
	}

	if(empty($_SESSION['mail'])){
		// maintanant just tester
		$_SESSION['mail'] = "htrrthfefezhtr@rgrrg";
	}
	if(empty($_SESSION['mailDeProfil'])){
		// maintanant just tester
		$_SESSION['mailDeProfil'] = $_SESSION['mail'];
	}
	if(!empty($_SESSION['mail'])){
		
?>
<div class="container">
	<div class="text-center">
		<h1>Mon Profil</h1>
	</div>
	<!-- Recherche dans la BDD-->
	<div class="input-group">
        <!-- Je ne sais pas comment faire... -->
		<img src="profil.jpg"  height="100" width="100" >
		<!-- Si genre = femme mettre Madame ... sinon Monsieur...-->
        <?php
            $membre = $conn->query("SELECT * FROM `users` WHERE mail='".$_SESSION['mail']."'");

            while($i = $membre->fetch_assoc()){
                if($i['genre'] == "m"){
                    echo 'Monsieur ';
                }
                else{
                    echo 'Madame ';
                }
                echo $i['nom'];
                echo ' ';
                echo $i['prenom'];
			
			$_SESSION['idMembre'] = $i['idMembre'];

			$membreDeProfil = $conn->query("SELECT * FROM `users` WHERE mail='".$_SESSION['mail']."'");
			while($nuplet = $membreDeProfil->fetch_assoc())
			{ 
				$_SESSION['idMembreProfil'] = $nuplet['idMembre'];
				$_SESSION['mailDeProfil'] = $nuplet['mail'];
			}

        ?>
	</div>
	<div class="input-group">
	    <p><b>Votre email : </b></p>
        <?php
            echo $i['mail'];
        ?>
	</div>
	<div class="form-group">
        <p><b>Votre numéro de téléphone : </b></p>
        <?php
            echo $i['telephone'];
        ?>
	</div>
    <a href="#" role="button" class="btn btn-warning "></span>Modifier vos informations personnelles</a>
	&emsp;&emsp;
	<br><br>
	<?= $this->Form->postButton(__('Modifier votre mot de passe'), ['action' => 'modifPass']) ?> 
	<?= $this->Form->postButton(__('Supprimer votre compte'), ['action' => 'supprimer']) ?>
		Attention: La suppression du compte est définitive !
	<?= $this->Form->postButton(__('Ajouter dans Favolist'), ['action' => 'ajouterFavo',$_SESSION['idMembre'] ,$_SESSION['idMembreProfil']]) ?>
</div>
<?php
    }}

?>