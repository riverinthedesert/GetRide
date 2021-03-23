<?php

//session_start();

try {
	$bdd = new PDO('mysql:host=localhost;dbname=getride', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (PDOException $e) {
	echo $e;
}


global $bdd;
$connection = new mysqli('localhost', 'root', '', 'getride');

if ($mysqli->connect_errno) {
	echo "Erreur de connexion à la base de données : " . $mysqli->connect_error;
	exit();
}


// récupération de l'adresse et du mot de passe
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$mail = $_POST["email"];
	$mdp = $_POST["password"];




	// on recherche la correspondance dans la base de données
	$requete = $base->query("SELECT idMembre FROM membre where 
              mail = $mail and motDePasse = $mdp");

	$res = $requete->fetch();
	$nb = $res['count(*)'];

	if ($nb == 1) {

		$_SESSION['login_user'] = $mail;

		header("location : acceuil.php");
	} else {

		header("Location: Connexion.php?erreur=mail_inconnu");
	}
	//mysqli->close();
}
