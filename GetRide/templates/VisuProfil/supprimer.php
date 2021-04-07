<?php

	use Cake\Datasource\ConnectionManager;
	use Cake\Event\EventInterface;
	use Cake\Mailer\Email;

    $session_active = $this->request->getAttribute('identity');
	$mail = $session_active->mail;

	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'getride');
	$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
	if($conn === false){
		die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
	}
		//On delete le compte
		$query = "DELETE FROM users WHERE mail='".$mail."';";
	if ($conn->query($query) === TRUE) {

		echo '<script type="text/javascript">
			window.location.replace("http://localhost/GetRide/GetRide/deconnexion");
		</script>';
		
	} 
?>