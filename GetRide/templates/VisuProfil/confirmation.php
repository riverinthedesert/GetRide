<?php


	
    session_start(); 
	
	

	$newPass = md5($_GET["confpass"]);


	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'getride');
	$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
	if($conn === false){
		die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
	}
	
	//Update membre set motDePasse = "12345" where mail IN (SELECT mail FROM membre where mail = "leon@gaml.com")
	
	$query = "Update membre set motDePasse = '$newPass' where mail IN 
	(SELECT mail FROM membre where mail='".$_SESSION['mail']."');";
	if ($conn->query($query) === TRUE) {
		echo "Mot de passe modifié avec succés!";
		echo '<script type="text/javascript">
			window.location.replace("http://localhost/GetRide/GetRide/visu-profil");
		</script>';
	} else {
		echo $query;
		echo "Echec modification mot de passe!";
		echo '<script type="text/javascript">
			window.location.replace("http://localhost/GetRide/GetRide/visu-profil/modif-pass");
		</script>';

	}
?>
