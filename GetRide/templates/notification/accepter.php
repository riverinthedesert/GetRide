<?php

	
	use Cake\Datasource\ConnectionManager;
	use Cake\Event\EventInterface;
	use Cake\Mailer\Email;

	
	//Connexion database
	
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'getride');
	$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
	if($conn === false){
		die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
	}
	
	//Recuperer l'id 
	$session_active = $this->request->getAttribute('identity');

	$id = $session_active->idMembre;
	$idOffre = $_GET['id'];

	$query = "SELECT * FROM `notification` WHERE idMembre='".$id."' AND idOffre='".$idOffre."'";


	//recuperer la notification
	$notification = $conn->query($query);
	if($i = $notification->fetch_assoc()){		
		$idExpediteur = $i['idExpediteur'];
		$idMembre = $i['idMembre'];
		$idOffre = $i['idOffre'];
	}
	
	

	
	echo "id Expediteur: ".$idExpediteur;
	echo "</br>";
	echo "id Membre: ".$idMembre;
	echo "</br>";
	echo "id Offre: ".$idOffre;

		echo "</br>";


	//Recuperer le nom en fonction de son id
	$queryName = "SELECT * FROM `users` WHERE idMembre='".$id."'";
	$name = $conn->query($queryName);

	if($i = $name->fetch_assoc()){		
		$nom = $i['nom'];
		$prenom = $i['prenom'];
	}
	$message = "L\'utilisateur ".$nom." ".$prenom." vous a accepté dans le trajet";



	echo $message;
	
	//Date actuel
	$now = date_create()->format('Y-m-d H:i:s');

	//Notifier l'utilisateur associé
	$queryNotification = "INSERT INTO NOTIFICATION(idMembre, message, estLue, necessiteReponse, idOffre,DateCreation,idExpediteur)
		VALUES('$idExpediteur','$message','0','0','$idOffre','$now','$idMembre');
		
		
		";
			echo "</br>";

	echo $queryNotification;
	$updateNotifications = $conn->query($queryNotification);

	
	
	
	
	//Le nombre de passager diminie
	
	
	
	//message d'erreur si nombre passager disponible = 0


?>