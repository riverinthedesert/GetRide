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
	
	
	echo "<h1>Profil</h1>";

	
	$id = $_GET["id"];

	$searchQuery = $conn->query("SELECT * FROM `users` WHERE idMembre='".$id."'");
	
	echo"<div class='container'>";

	while($i = $searchQuery->fetch_assoc()){
		if($i['pathPhoto']!=null){
			echo "<img src='".$i['pathPhoto']."'  height='100' width='100' >";
		}


		if($i['genre']=='m'){
			echo "<b>M. </b>";
		} else {
			echo "<b>Mme </b>";
		}
		echo $i['nom']." ".$i['prenom'];
		
		echo "<br>";
		echo "<b>Mail : </b>".$i['mail'];
		
		echo "<br>";
		echo "<b>Numéro de téléphone : </b>".$i['telephone']."</b>";
		
		echo "<br>";
		echo "<b>Date de naissance</b> : ".$i['naissance'];
		
		echo "<br>";
		echo "<b>Conducteur :</b>".$i['estConducteur'];
	}
	
	echo "</div>";
?>