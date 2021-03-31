<?php


	
	use Cake\Datasource\ConnectionManager;
	use Cake\Event\EventInterface;
	use Cake\Mailer\Email;

    $session_active = $this->request->getAttribute('identity');
	$mail = $session_active->mail;
	
	//A mettre dans les mots de passe seront hashés en md5!
	//$newPass = md5($_GET["confpass"]);
	$newPass = $_GET["confpass"];

	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'getride');
	$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
	if($conn === false){
		die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
	}
	
	//Update users set motDePasse = "12345" where mail IN (SELECT mail FROM membre where mail = "leon@gaml.com")
	
	$query = "Update users set motDePasse = '$newPass' where mail IN 
	(SELECT mail FROM users where mail='".$mail."');";
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
