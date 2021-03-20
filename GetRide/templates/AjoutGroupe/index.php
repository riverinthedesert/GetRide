<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'getride');

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Vérifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}

$username = 'leon@gaml.com';

$_SESSION['email'] = $username;
$_SESSION['idMembre'] = 0;

if(!empty($_SESSION['email'])){
    if (isset($_REQUEST['nom'])){
        $nom = $_REQUEST['nom'];
        $idAdmin = $_SESSION['idMembre'];
        if (isset($_REQUEST['comment'])){
            $comment = $_REQUEST['comment'];
            $query = "INSERT into `groupe` (nom, idAdmin, commentaire) VALUES ('$nom', '$idAdmin', '$comment')";
        }
        else
            $query = "INSERT into `groupe` (nom, idAdmin) VALUES ('$nom', '$idAdmin')";
    }

?>

<div class="container">
	<div class="text-center">
		<h1>Création d'un groupe privé</h1>
	</div>
	
	<form>
		<fieldset>
			<div class="form-group">
				<label for="nom">Nom (*):</label>
				<input type="text" class="form-control" required id="nom" placeholder="Entrer nom" name="nom">
			</div>
			<div class="form-group">
				<label for="comment">Commentaires (optionnels):</label>
				<textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
			</div>
			<h4>Vous pouvez ajouter des personnes de vos favoris dans ce nouveau groupe :</h4>
			<div class="form-group">
				<label for="favoris">Mes favoris :</label>
                <!-- Boucle pour chaque favoris.
                        Affichage de la photo
                        Affichage du nom et prenom
                        Affichage d'un bouton pour envoyer une notification à la personne -->
			</div>
            <input type="submit" name="submit" value="Creer Groupe" />
		</fieldset>
	</form>
</div>

<?php
}
?>