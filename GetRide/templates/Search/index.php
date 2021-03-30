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
	
	$compteur = 0;
	if(isset($_POST['text'])){
		$searchQuery = $conn->query("SELECT * FROM `users` WHERE nom='".$_POST['text']."'
														      OR prenom='".$_POST['text']."'
														      OR mail='".$_POST['text']."'
									");
		while($i = $searchQuery->fetch_assoc()){
			echo "<a href=profile?id=".$i['idMembre']."> ";
			echo $i['mail'];
			echo "</a>";
			$compteur++;
			echo "</br>";
		}	
		
		if($compteur == 0){
			echo "Pas d'utilisateur trouvé";
		}
	}
	

	
	
	
?>