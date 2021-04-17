<html>
<?php
   	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'getride');
	$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
	if($conn === false){
		die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
	}
	use Cake\Datasource\ConnectionManager;
	use Cake\Event\EventInterface;
	use Cake\Mailer\Email;
    $session_active = $this->request->getAttribute('identity');
	$mail = $session_active->mail;
	$membre = $conn->query("SELECT * FROM `users` WHERE mail='".$mail."'");
	while($i = $membre->fetch_assoc()){
		$nom = $i['nom'];
		$prenom = $i['prenom'];
		$dtn = $i['naissance'];
		$tel = $i['telephone'];
		$genre = $i['genre'];
		if($i['genre']=="m"){
			$genre = "Masculin";
		} else if($i['genre']=="f"){
			$genre = "Féminin";
		} else {
			$genre = "Autre";
		}
		$estConducteur = $i['estConducteur'];
	}	
?>


<script>


  function appendMessageToErrorDiv(div, message) {
    div.appendChild(document.createTextNode(message));
    div.appendChild(document.createElement("br"));
  }
  
	function Confirm(){
		var error_div = document.getElementById("submission_errors");
		error_div.innerHTML = "";
		
		var nom = document.getElementById("nom").value;
		var nomRegex = "[a-zA-Z]{1}[a-zA-Z-\\s]+";
		var nomOk = (nom == nom.match(nomRegex));
		if (!nomOk) {
		  appendMessageToErrorDiv(error_div, "Veuillez entrer un nom valide !");
		}
		
		var prenom = document.getElementById("prenom").value;
		var prenomRegex = "[a-zA-Z]{1}[a-zA-Z-\\s]+";
		var prenomOk = (prenom == prenom.match(prenomRegex));
		
		
		var tel = document.getElementById("tel").value;
		var telephoneRegex = "[0]{1}[0-9]{9}";
		var telOk = (tel == tel.match(telephoneRegex));
		if (!telOk) {
			appendMessageToErrorDiv(error_div, "Veuillez entrer un numéro de téléphone valide !");
		}
		var sex = document.getElementById("sex").value;
		if(!(sex == "Masculin" || sex == "Féminin" || sex == "Autre")){
			appendMessageToErrorDiv(error_div, "Veuillez entrer un genre valide !");
		}
		var conducteur = document.getElementById("conducteur").value;
		if(!(conducteur == "Oui" || conducteur == "Non")){
			appendMessageToErrorDiv(error_div, "Veuillez un état de conducteur valide !");
		}
		if (error_div.innerHTML == "") {
			if (confirm("Etes-vous sûr de vouloir modifier vos informations personnelles ?")) {
				document.myForm.submit();
			} else {
				window.location.replace("../visu-profil");
			}
		}
	}
</script>
	Les informations entrées seront modifiées.
  <form name="myForm" action="confirmInfos" method="get">
		<label for="lname">Modifier votre nom:</label><br>
		<input type="text" id="nom" name="nom" value="<?php echo $nom?>"><br>
		<label for="fname">Modifier votre prenom:</label><br>
		<input type="text" id="prenom" name="prenom" value="<?php echo $prenom?>">
		<label for="dtn">Modifier votre date de naissance:</label><br>
		<input type="date" id="dtn" name="dtn" value="<?php echo $dtn?>">
		<label for="dtn">Modifier votre Telephone:</label><br>
		<input type="text" id="tel" name="tel" value="<?php echo $tel?>">
		<label for="dtn">Modifier votre sexe (Masculin - Féminin - Autre):</label><br>
		<input type="text" id="sex" name="sex" value="<?php echo $genre?>">
		<label for="dtn">Modifier si vous êtes conducteur (Oui - Non):</label><br>
		<input type="text" id="conducteur" name="conducteur" value="<?php echo $estConducteur?>">
		<input onclick = "Confirm()" type="button" value="Envoyer">
		<div style="color:red;" id="submission_errors"/>
	</form>
</html>



