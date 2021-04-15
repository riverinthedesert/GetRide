<!DOCTYPE html>
<html lang="fr">

<head>
	<title>Se connecter</title>
</head>

<?php
use Cake\Datasource\ConnectionManager;
use Cake\View\Helper\FlashHelper;

$conn = ConnectionManager::get('default');
$session_active = $this->request->getAttribute('identity');
    
$AfficherFormulaire=1;

$session_active = $this->request->getAttribute('identity');
if(!is_null($session_active)){
        if(!isset($_POST['villeDepart']) || !isset($_POST['dateD']) || !isset($_POST['dateA'])){
			$AfficherFormulaire=1;
		}
		else{
			$vD = $_POST['villeDepart'];
			$vA = $_POST['villeArrivee'];


			$requete="SELECT * FROM `villes_france_free` WHERE ville_nom_reel='".$vD."'";
			$reqidG = $conn->execute($requete)->fetchAll('assoc');

			$reqidGB = $conn->execute("SELECT * FROM `villes_france_free` WHERE ville_nom_reel='".$vA."'")->fetchAll('assoc');


			//Date de départ
			setlocale(LC_TIME, 'fra_fra');

			//echo $_POST["dateD"];

			$date = date_create($_POST['dateD']);
			$dateA = date_create($_POST['dateA']);

			$_POST['dateD'] = date_format($date, 'Y-m-d H:i:s');
			$_POST['dateA'] = date_format($dateA, 'Y-m-d H:i:s');

			$jourD = date_format($date, 'd');
			$jourA = date_format($dateA, 'd');

			$moisD = date_format($date, 'm');
			$moisA = date_format($dateA, 'm');

			$anneeD = date_format($date, 'Y');
			$anneeA = date_format($dateA, 'Y');

			$heureD = date_format($date, 'H');
			$heureA = date_format($dateA, 'H');

			
			if(empty($reqidG)){
				echo "Le ville de départ n'existe pas !\n";
				$AfficherFormulaire=1;
			}
			elseif(empty($reqidGB))
			{
				echo "Le ville de d'arrivée n'existe pas !\n";
				$AfficherFormulaire=1;
			}else{
				if($anneeD > $anneeA){
					echo "Vous ne pouvez pas arriver avant d'être parti !";
					$AfficherFormulaire=1;
				}
				else if($anneeD == $anneeA){
					if($moisD > $moisA){
						echo "Vous ne pouvez pas arriver avant d'être parti !";
						$AfficherFormulaire=1;
					}
					else if($moisD == $moisA){
						if($jourD > $jourA){
							echo "Vous ne pouvez pas arriver avant d'être parti !";
							$AfficherFormulaire=1;
						}
						else if($jourD == $jourA){
							if($heureD > $heureA){
								echo "Vous ne pouvez pas arriver avant d'être parti !";
								$AfficherFormulaire=1;
							}
							else{
								$AfficherFormulaire=0;
							}
						}
						else{
							$AfficherFormulaire=0;
						}
					}
					else{
						$AfficherFormulaire=0;
					}
				}
				else{
					$AfficherFormulaire=0;
				}
			}
		}
		
		
	
if($AfficherFormulaire==1){
	setlocale(LC_TIME, 'fra_fra');

	$jour = date("d") + 1;
	$mois = date("m");
	$anne = date("Y");
?>
<div class="text-center">
		<h1>Ajouter une offre privée</h1>
</div>
<form method="post" action="/GetRide/GetRide/Offre/add">
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="dateD">Date de départ *</label>
			<input type="datetime-local" class="form-control" name="dateD" id="dateD" min="<?php echo $anne."-".$mois."-".$jour; ?>T00:00" required >
		</div>

		<div class="form-group col-md-6">
			<label for="dateA">Date de d'arrivée *</label>
			<input type="datetime-local" class="form-control" name="dateA" id="dateA" min="<?php echo $anne."-".$mois."-".$jour; ?>T00:00" required >
		</div>
	


		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="villeDepart">Ville de départ *</label>
				<input  name="villeDepart" id="villeDepart" placeholder="Départ" type="text" class="form-control" required>
			</div>

			<div class="form-group col-md-6">
				<label for="villeArrivee">Ville de d'arrivée *</label>
				<input  name="villeArrivee" id="villeArrivee" placeholder="Arrivée" type="text" class="form-control" required>
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="nbPassager">Nombre de passager maximal *</label>
				<input id="nbPassager" placeholder="Nombre de passager" type="number" min="1" class="form-control" required>
			</div>

			<div class="form-group col-md-6">
				<label for="prix">Prix de la course * (par personne)</label>
				<input id="prix" placeholder="Nombre de passager" type="number" class="form-control" required>
			</div>
		</div>


		<div class="form-group">
				<label for="prdv">Précision du lieu de rendez-vous * (Où ...)</label>
				<input type="text" class="form-control" id="prdv" required>
		</div>
		<div class="form-group">
				<label for="comment">Commentaire (Possiblité d'avoir : chien, bagage... )</label>
				<input type="text" class="form-control" id="comment" >
		</div>

	</div>
	<button type="submit" class="btn btn-primary">Ajouter</button>
	<br/><br/>
	* Champs obligatoires !
</form>

</html>

<?php
	}
	else{
		$vD = $_POST['villeDepart'];
		$vA = $_POST['villeArrivee'];
	
		$reqidG = $conn->execute("SELECT * FROM `villes_france_free` WHERE ville_nom_reel='".$vD."'")->fetchAll('assoc');
	
		$reqidGB = $conn->execute("SELECT * FROM `villes_france_free` WHERE ville_nom_reel='".$vA."'")->fetchAll('assoc');
	
		$c = "";
		if(isset($_POST['comment']))
			$c = $_POST['comment'];

		$nbP = "1";
		if(isset($_POST['nbPassager']))
			$nbP = $_POST['nbPassager'];

		$pr = "1";
		if(isset($_POST['prix']))
			$pr = $_POST['prix'];
			
		$Lieu = "1";
		if(isset($_POST['prdv']))
			$Lieu = $_POST['prdv'];
	
	//INSERT INTO `offre`(`idOffre`, `horaireDepart`, `horaireArrivee`, `nbPassagersMax`, `idVilleDepart`, `idVilleArrivee`, `idConducteur`, 
	//`prix`, `idEtape`, `idGroupe`, `estPrivee`, `precisionLieu`, `commentaire`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]','[value-11]','[value-12]','[value-13]')
		$conn->insert('offre', [
			'horaireDepart' => $_POST['dateD'] ,
			'horaireArrivee' => $_POST['dateA'] ,
			'nbPassagersMax' => $nbP ,
			'idVilleDepart' => $reqidG[0]['ville_id'] ,
			'idVilleArrivee' => $reqidGB[0]['ville_id'] ,
			'idConducteur' => $session_active->idMembre , //id de la personne qui ajoute l'offre
			'prix' => $pr ,
			'idEtape' => 'NULL' ,
			'idGroupe' => '0' ,
			'estPrivee' => '0' ,
			'precisionLieu' => $Lieu ,
			'commentaire' => $c 
			]);
		//$query2 = "INSERT into `groupeMembre` (idGroupe, idUtilisateur) VALUES ('$idGrp', '$idAdmin')";
		
		echo "Salut !";
		header('Location: Offre');
		exit();
	}
}

?>

