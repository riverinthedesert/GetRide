<?php

echo "Participants à mes trajets: ";

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
	echo "Mon id: ".$id."</br>";
	$queryRecuperationMesOffres = "Select * from offre where idConducteur = '".$id."'";
	$getOffre = $conn->query($queryRecuperationMesOffres);
	echo "Mes Trajets:</br>";
	while ($i = $getOffre->fetch_assoc()){		
		$queryRecuperationMesNotifications = "Select * from notification where idOffre = '".$i['idOffre']."' AND idExpediteur='".$id."'";
		$getIdMembre = $conn->query($queryRecuperationMesNotifications);
		while ($j = $getIdMembre->fetch_assoc()){
			echo "Offre: ".$i['idOffre'];
			$idOffre = $i['idOffre'];
			echo " Expediteur: ";
			echo $j['idMembre'];
			$idExpediteur = $j['idExpediteur'];
			echo "</br>";
			echo "Annuler la participation de ";
			$queryRecuperationNom = "Select * from users where idMembre = '".$j['idMembre']."'";
			$idMembre = $j['idMembre'];
			$getNomMembre = $conn->query($queryRecuperationNom);
			if ($k = $getNomMembre->fetch_assoc()){
				echo $k['nom']." ".$k['prenom'];
			}
			echo " pour le trajet: ";
			$queryRecuperationTrajet = "Select * from offre where idOffre ='".$i['idOffre']."'";
			$getOffre = $conn->query($queryRecuperationTrajet);
			if($l = $getOffre->fetch_assoc()){
				$queryRecuperationVilleDepart = "Select * from villes_france_free where ville_id = '".$l['idVilleDepart']."'";
				$queryRecuperationVilleArrivee = "Select * from villes_france_free where ville_id = '".$l['idVilleArrivee']."'";
				$getVilleDepart = $conn->query($queryRecuperationVilleDepart);
				$getVilleArrivee = $conn->query($queryRecuperationVilleArrivee);
				if($m = $getVilleDepart->fetch_assoc()){
					if($n = $getVilleArrivee->fetch_assoc()){
						echo $m['ville_nom_reel'];
						echo "-";
						echo $n['ville_nom_reel'];
					}
				}
			}
			
			//Ajout d'un petit bouton pour tej la personne;
			echo "</br>";

			echo "<a href='AnnulationParticipation/supprimer?idOffre=".$idOffre."&idExpediteur=".$idMembre."'>Retirer la personne de vos trajets</a>";


			}
	}

?>

