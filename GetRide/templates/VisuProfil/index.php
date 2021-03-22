<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'getride');

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
session_start();
// Vérifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
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
            $membre = $conn->query("SELECT * FROM `membre` WHERE mail='".$_SESSION['mail']."'");
            while($i = $membre->fetch_assoc()){
                if($i['genre'] == 'm'){
                    echo 'Monsieur ';
                }
                else{
                    echo 'Madame ';
                }
                echo $i['nom'];
                echo ' ';
                echo $i['prenom'];
                
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
	
    <a href="#" role="button" class="btn btn-warning "></span>Modifier mot de passe</a>
	&emsp;&emsp;
    <a href="#" role="button" class="btn btn-warning "></span>Modifier profil</a>
	<br><br>
    <a href="#" role="button" class="btn btn-danger "><span class="glyphicon glyphicon-remove"></span> Fermer mon compte</a>
	La suppression du compte est définitive !
</div>

<?php
    }}
?>