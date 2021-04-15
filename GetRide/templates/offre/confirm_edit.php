<?php


$hd = $_GET['hd'];

$hd = str_replace("T", " ",$hd);
$ha = $_GET['ha'];
$ha = str_replace("T", " ",$ha);

$nbpassagers = $_GET['nbpassagers'];
$idVilleDepart = $_GET['idVilleDepart'];
$idVilleArrivee = $_GET['idVilleArrivee'];
$prix = $_GET['prix'];
$idEtape = $_GET['idEtape'];
$idGroupe = $_GET['idGroupe'];
$precisionLieu = $_GET['precisionLieu'];
$commentaire = $_GET['commentaire'];
$idOffre = $_GET['idOffre'];



echo $hd;
echo "</br>";
echo $ha;
echo "</br>";

echo $nbpassagers;
echo "</br>";

echo $idVilleDepart;
echo "</br>";

echo $idVilleArrivee;
echo "</br>";

echo $prix;
echo "</br>";

echo $idEtape;
echo "</br>";

echo $idGroupe;
echo "</br>";

echo $precisionLieu;
echo "</br>";


echo $_GET['idOffre'];
echo "</br>";


echo $commentaire;

	$query =("Update `offre` 
		set horaireDepart = '".$hd."',
		horaireArrivee = '".$ha."',
		nbPassagersMax = '".$nbpassagers."',
		prix = '".$prix."',
		idEtape = '".$idEtape."',
		idGroupe = '".$idGroupe."',
		precisionLieu = '".$precisionLieu."'
		commentaire = '".$commentaire."'
		WHERE idOffre='".$idOffre."'");
		
		$compteur = 0;
		
$queryFinale = "Update offre
	set horaireDepart = '".$hd."',
	horaireArrivee = '".$ha."',
	nbPassagersMax = '".$nbpassagers."',
	prix = '".$prix."' ";
	
if(!($idEtape == NULL) or $idEtape != ""){
	$queryFinale = $queryFinale.",idEtape = '".$idEtape."'";
	$compteur = $compteur + 1;
} 

if(!($idGroupe == NULL) or $idGroupe != ""){
	$queryFinale = $queryFinale.",idGroupe = '".$idGroupe."'";
		$compteur = $compteur + 1;
}

if(!($precisionLieu == NULL) or $precisionLieu != ""){
	$queryFinale = $queryFinale.",precisionLieu = '".$precisionLieu."'";
		$compteur = $compteur + 1;
}

if(!($commentaire == NULL) or $commentaire != ""){
	$queryFinale = $queryFinale.",commentaire = '".$commentaire."'";
		$compteur = $compteur + 1;
}

if($compteur == 0){
	$queryFinale = $queryFinale."";
}
$queryFinale = $queryFinale.";";


		echo $queryFinale;
	
	
	//$queryUpdate = $conn->query($queryFinale);
	/*echo '<script type="text/javascript">
			window.location.replace("../visu-profil");
		</script>';*/

?>