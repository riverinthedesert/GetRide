<html>
<?php
    session_start(); 
   	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'getride');
	$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
	if($conn === false){
		die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
	}

	$membre = $conn->query("SELECT * FROM `membre` WHERE mail='".$_SESSION['mail']."'");
	while($i = $membre->fetch_assoc()){
		$ancienPass = $i['motDePasse'];
	}	
	?>

<script src="https://lig-membres.imag.fr/donsez/cours/exemplescourstechnoweb/js_securehash/md5.js"></script>
<script>


  function appendMessageToErrorDiv(div, message) {
    div.appendChild(document.createTextNode(message));
    div.appendChild(document.createElement("br"));
  }
  
	function Confirm(){
		var error_div = document.getElementById("submission_errors");
		error_div.innerHTML = "";
		var oldPassConf = <?php echo json_encode($ancienPass); ?>;
		var oldPass = document.getElementById("oldpass").value;
		var newPass = document.getElementById("newpass").value;
		var confPass = document.getElementById("confpass").value;	
		if(oldPassConf==calcMD5(oldPass)){
			if(newPass==confPass){
			} else {
				appendMessageToErrorDiv(error_div, "Votre mot de passe de confirmation est incorrect !");
			}
		} else {
			appendMessageToErrorDiv(error_div, "Votre mot de passe actuel est incorrect !");
		}
		/*   submit form if form validates without any error   */
		if (error_div.innerHTML == "") {
			document.myForm.submit();
		}
	}
</script>
  <form name="myForm" action="confirmation" method="get">
		<label for="fname">Ancien mot de passe:</label><br>
		<input type="text" id="oldpass" name="oldpass" required><br>
		<label for="lname">Nouveau mot de passe:</label><br>
		<input type="text" id="newpass" name="newpass" required>
		<label for="lname">Confirmation nouveau mot de passe:</label><br>
		<input type="text" id="confpass" name="confpass" required>
		<input onclick = "Confirm()" type="button" value="Envoyer">
		<div style="color:red;" id="submission_errors"/>
	</form>
</html>