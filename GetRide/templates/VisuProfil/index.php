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

	use Cake\Datasource\ConnectionManager;
	use Cake\Event\EventInterface;
	use Cake\Mailer\Email;

    $session_active = $this->request->getAttribute('identity');
	$mail = $session_active->mail;
	$idMembre = $session_active->idMembre;
		
?>
<div class="container">
	<div class="text-center">
		<h1>Mon Profil</h1>
	</div>
	<!-- Recherche dans la BDD-->
	<div class="input-group">
		<img src="profil.jpg"  height="100" width="100" >
        <?php
            $membre = $conn->query("SELECT * FROM `users` WHERE mail='".$mail."'");
            while($i = $membre->fetch_assoc()){
                if($i['genre'] == "m"){
                    echo 'Monsieur ';
                }
                else if ($i['genre'] == "f"){
                    echo 'Madame ';
                }
                echo $i['nom'];
                echo ' ';
                echo $i['prenom'];
				
				
			
			$_SESSION['idMembre'] = $i['idMembre'];

			$membreDeProfil = $conn->query("SELECT * FROM `users` WHERE mail='".$mail."'");
			while($nuplet = $membreDeProfil->fetch_assoc())
			{ 
				$idMembreProfil =  $nuplet['idMembre'];
				$mailDeProfil = $nuplet['mail'];
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
		
		<p><b>Votre date de naissance : </b></p>
        <?php
            echo $i['naissance'];
        ?>
	</div>
	&emsp;&emsp;
	<br><br>
	<?= $this->Form->postButton(__('Modifier ses informations personnelles'), ['action' => 'modifInfos']) ?>
	<?= $this->Form->postButton(__('Modifier votre mot de passe'), ['action' => 'modifPass']) ?> 
	<?= $this->Form->postButton(__('Supprimer votre compte'), ['action' => 'supprimer']) ?>
		Attention: La suppression du compte est définitive !
</div>
<?php
    }

?>