<?php
use Cake\Datasource\ConnectionManager;
$conn = ConnectionManager::get('default');

$session_active = $this->request->getAttribute('identity');
if(!is_null($session_active)){
    if (isset($_REQUEST['nom'])){
        $nom = $_REQUEST['nom'];
        if (isset($_REQUEST['comment'])){
            $comment = $_REQUEST['comment'];
            //insertion du groupe avec commentaire
            $conn->insert('groupe', [
                'nom' => $nom,
                'idAdmin' => $idMembre,
                'commentaire' => $comment ]);
            //$query = "INSERT into `groupe` (nom, idAdmin, commentaire) VALUES ('$nom', '$idMembre', '$comment')";
        }
        else
            $conn->insert('groupe', [
                'nom' => $nom,
                'idAdmin' => $idMembre]);
            //$query = "INSERT into `groupe` (nom, idAdmin) VALUES ('$nom', '$idMembre')";

       // On cherche l'id du créateur de cette offre
       $requete="SELECT idGroupe FROM `groupe` WHERE nom='".$nom."'";
       $reqidG = $conn->execute($requete)->fetchAll('assoc');

       $idGrp = $reqidG[0]["idGroupe"];

        //Faire une modification s'il y a des amis en plus d'ajouté
        $conn->insert('groupeMembre', [
            'idGroupe' => $idGrp,
            'idUtilisateur' => $idMembre]);
        //$query2 = "INSERT into `groupeMembre` (idGroupe, idUtilisateur) VALUES ('$idGrp', '$idAdmin')";
        
        header('Location: VisuGroupe');
        exit();
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

                    $membreFavori="SELECT * FROM `membrefavo` WHERE idMembre=".$idMembre;
                    $mFA = $conn->execute($membreFavori)->fetchAll('assoc');


                    //$membreFavori = $conn->query("SELECT * FROM `membrefavo` WHERE idMembre='".$_SESSION['idMembre']."'");
                    foreach($mFA as $mF){
                        $membref++;
                        $mff = $mF['idMembreFavo'];
                        $name="SELECT * FROM `users` WHERE idMembre='".$mff."'";
                        $nomF = $conn->execute($name)->fetchAll('assoc');

                        //$name = $conn->query("SELECT * FROM `membre` WHERE idMembre='".$mF['idMembreFavo']."'");
				        foreach($nomF as $nom){
                            if($nom['mail'] != $mail){
                ?>

                                <div class="form-group">
                                    <label for="nom" ><?php echo $nom['nom']; echo ' '; echo $nom['prenom']; ?></label>
                                    <a href="#" role="button" class="btn btn-info "><span class="glyphicon glyphicon-plus"></span> Envoyer une notification</a>
                                </div>
                                <p><br></p>
                                <?php
                            }
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