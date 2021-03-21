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

$username = 'trice@gogl.com';

$_SESSION['mail'] = $username;
$idMembre = $conn->query("SELECT idMembre FROM `membre` WHERE mail='".$_SESSION['mail']."'");
while($i = $idMembre->fetch_assoc()){
    $_SESSION['idMembre'] = $i['idMembre'];
}

if(!empty($_SESSION['mail'])){
    if (isset($_REQUEST['nom'])){
        $nom = $_REQUEST['nom'];
        $idAdmin = $_SESSION['idMembre'];
        if (isset($_REQUEST['comment'])){
            $comment = $_REQUEST['comment'];
            $query = "INSERT into `groupe` (nom, idAdmin, commentaire) VALUES ('$nom', '$idAdmin', '$comment')";
        }
        else
            $query = "INSERT into `groupe` (nom, idAdmin) VALUES ('$nom', '$idAdmin')";

        //Lancer la requete sur la bdd
        $res = mysqli_query($conn, $query);

        $idGroupe = $conn->query("SELECT idGroupe FROM `groupe` WHERE nom='".$nom."'");
        while($i = $idGroupe->fetch_assoc()){
            $idGrp = $i['idGroupe'];
        }

        //Faire une modification s'il y a des amis en plus d'ajouté
        $query2 = "INSERT into `groupeMembre` (idGroupe, idUtilisateur) VALUES ('$idGrp', '$idAdmin')";
        
         //Lancer la requete sur la bdd
         $res2 = mysqli_query($conn, $query2);
        
        if($res){
            if($res2){
                header('Location: VisuGroupe');
                exit();
            }
        }
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
                        Affichage de la photo !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                        Affichage du nom et prenom
                        Affichage d'un bouton pour envoyer une notification à la personne -->
                <?php
                    $membref = 0;

                    $membreFavori = $conn->query("SELECT * FROM `membrefavo` WHERE idMembre='".$_SESSION['idMembre']."'");
                    while($donnees = $membreFavori->fetch_assoc()){
                        $membref++;
                        
                        $name = $conn->query("SELECT * FROM `membre` WHERE idMembre='".$donnees['idMembreFavo']."'");
				        while($nom = $name->fetch_assoc()){
                            
                ?>

                            <div class="form-group">
                                <label for="nom" ><?php echo $nom['nom']; echo ' '; echo $nom['prenom']; ?></label>
                                <a href="#" role="button" class="btn btn-info "><span class="glyphicon glyphicon-plus"></span> Envoyer une notification</a>
                            </div>
                            <p><br></p>
                            <?php
                        }
                    }

                            ?>
			</div>
            <div>
                <input type="submit" name="submit" value="Creer Groupe"/>
                <a href="VisuGroupe" role="button" class="btn btn-warning "><span class="glyphicon glyphicon-remove"></span> Annuler</a>
            </div>
        </fieldset>
	</form>
</div>

<?php
}
?>