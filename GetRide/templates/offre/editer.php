
<html>
<?php

	//Connection database
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

	$idConducteur = $session_active->idMembre;
	$idOffre = $_GET['id'];


	//recuperation data de l'offre à éditer
	$getOffre = $conn->query("SELECT * FROM `offre` WHERE idOffre='".$idOffre."'");
	while($i = $getOffre->fetch_assoc()){
		$horaireDepart = $i['horaireDepart'];
		$horaireArrivee = $i['horaireArrivee'];
		$nbpassagersMax = $i['nbPassagersMax'];
		$idVilleDepart = $i['idVilleDepart'];
		$idVilleArrivee = $i['idVilleArrivee'];
		$prix = $i['prix'];
		$idEtape = $i['idEtape'];
		$idGroupe = $i['idGroupe'];
		$precisionLieu = $i['precisionLieu'];
		$commentaire = $i['commentaire'];
	}	
	





?>
<script>


  function appendMessageToErrorDiv(div, message) {
    div.appendChild(document.createTextNode(message));
    div.appendChild(document.createElement("br"));
  }
  
	function ConfirmEdit(){
		var error_div = document.getElementById("submission_errors");
		error_div.innerHTML = "";

		//Mettre les regex ici
		
		
		if (error_div.innerHTML == "") {
			if (confirm("Etes-vous sûr de vouloir editer ce trajet ?")) {
				document.myForm.submit();
			}
		}
	}
</script>

	Les informations entrées seront modifiées.

  <form name="myForm" action="confirmEdit" method="get">
		<label for="HoraireDepart">Modifier l'horaire de départ:</label><br>
		
		<?php
		//Parsing horaire pour bien l'afficher
			$horaireDepart1 = date("Y-m-d", strtotime($horaireDepart));
			$horaireDepart2 = date("H:m", strtotime($horaireDepart));
			$horaireDepart3 = $horaireDepart1."T".$horaireDepart2;
		?>
		Horaire de départ actuel:

		<input type="datetime-local" id="hd" name="hd" value="<?php echo $horaireDepart3?>"><br>
		<label for="HoraireArrivee">Modifier l'horaire d'arrivée:</label><br>
		Horaire d'arrivée actuel: 
		<?php
			$horaireArrivee1 = date("Y-m-d", strtotime($horaireArrivee));
			$horaireArrivee2 = date("H:m", strtotime($horaireArrivee));
			$horaireArrivee3 = $horaireArrivee1."T".$horaireArrivee2;
		?>
		<input type="datetime-local" id="ha" name="ha" value="<?php echo $horaireArrivee3?>">
		<label for="nbpassagersMax">Modifier le nombre de passagers max:</label><br>
		<input type="text" id="nbpassagers" name="nbpassagers" value="<?php echo $nbpassagersMax?>">
		<label for="idVilleDepart">Modifier l'id de la ville de départ:</label><br>
		<input type="text" id="idVilleDepart" name="idVilleDepart" value="<?php echo $idVilleDepart?>">
		<label for="idVilleArrivee">Modifier l'id de la ville d'arrivée</label><br>
		<input type="text" id="idVilleArrivee" name="idVilleArrivee" value="<?php echo $idVilleArrivee?>">
		<label for="prix">Modifier le prix de votre trajet</label><br>
		<input type="text" id="prix" name="prix" value="<?php echo $prix?>">
		<label for="idEtape">Modifier le numéro de l'étape</label><br>
		<input type="text" id="idEtape" name="idEtape" value="<?php echo $idEtape?>">
		<label for="idGroupe">Modifier l'id de groupe</label><br>
		<input type="text" id="idGroupe" name="idGroupe" value="<?php echo $idGroupe?>">
		<label for="precisionLieu">Modifier la précision du le lieu</label><br>
		<input type="text" id="precisionLieu" name="precisionLieu" value="<?php echo $precisionLieu?>">
		<label for="commentaire">Modifier votre commentaire</label><br>
		<input type="text" id="commentaire" name="commentaire" value="<?php echo $commentaire?>">
		
		<input for="text", id = "idOffre" name ="idOffre" type = "hidden" value = "<?php echo $idOffre?>">
		<input onclick = "ConfirmEdit()" type="button" value="Envoyer">
		<div style="color:red;" id="submission_errors"/>
	</form>


</html>