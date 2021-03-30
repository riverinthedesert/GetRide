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
	
	
	
	echo "Profile";
	echo "</br>";
	$id = $_GET["id"];

	$searchQuery = $conn->query("SELECT * FROM `users` WHERE idMembre='".$id."'");
	while($i = $searchQuery->fetch_assoc()){
		if($i['genre']=='m'){
			echo "M. ";
		} else {
			echo "Mme ";
		}
		echo $i['nom']." ".$i['prenom'];
		
		echo "<br>";
		
		echo "Mail: ".$i['mail'];
		
		echo "<br>";
		echo "Numéro de téléphone : ".$i['telephone'];
		
		echo "<br>";
		echo "Date de naissance: : ".$i['naissance'];
		
		echo "<br>";
		echo "Conducteur: ".$i['estConducteur'];


		

	}
?>