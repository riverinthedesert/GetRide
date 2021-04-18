<style>
body {
	background: WhiteSmoke  no-repeat center top;
}

</style>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.7.3/themes/base/jquery-ui.css">

<?php 
    use Cake\Datasource\ConnectionManager;
    $conn = ConnectionManager::get('default');
    
    $session_active = $this->request->getAttribute('identity');

    //Faire la vérification des offres
    $donnees = $conn->execute("SELECT * FROM `offre` ")->fetchAll('assoc');
         
    
    

    function offreT($of, $cond, $date)
    {
        //of = idOffre
        //cond = idConducteur
        //date = dateTrajet

        $conn = ConnectionManager::get('default');
        
        //Fonction vérifier si offre est déjà ajouté sinon ajouter
        $trajet = $conn->execute("SELECT * FROM `historiquetrajet` ")->fetchAll('assoc');
        $oui = 0;
        foreach($trajet as $t){
            if($t['idOffre'] == $of)
                $oui = 1;
        }
        if($oui == 0){
            $idM = $cond;
            $idO = $of;
            $d = $date;
            $conn->insert('historiquetrajet', [
                'idMembre' => $idM ,
                'idOffre' =>  $idO ,
                'dateTrajet' => $d
                ]);

            //Ajouter les passagers
            $membre = $conn->execute("SELECT * FROM `copassager` WHERE idOffre='".$idO."' ")->fetchAll('assoc');
            foreach($membre as $m){
                $me = $m['idMembre'];
                $conn->insert('historiquetrajet', [
                    'idMembre' => $me ,
                    'idOffre' =>  $idO ,
                    'dateTrajet' => $d
                    ]);
            }
        }
    }


    foreach($donnees as $don){
        setlocale(LC_TIME, 'fra_fra');

        $jour = date("d");
        $mois = date("m");
        $anne = date("Y");
        $heure = date("H");

        $dateA = date_create($don['horaireArrivee']);

        $don['horaireArrivee'] = date_format($dateA, 'Y-m-d');

        $jourA = date_format($dateA, 'd');
        $moisA = date_format($dateA, 'm');
        $anneeA = date_format($dateA, 'Y');
        $heureA = date_format($dateA, 'H');


        if($anne == $anneeA){
            if($mois == $moisA){
                if($jour == $jourA){
                    if($heure == $heureA){
                        offreT($don['idOffre'], $don['idConducteur'], $don['horaireArrivee']);
                    }
                    elseif($heure > $heureA){
                        offreT($don['idOffre'], $don['idConducteur'], $don['horaireArrivee']);
                    }
                }
                elseif($jour > $jourA){
                    offreT($don['idOffre'], $don['idConducteur'], $don['horaireArrivee']);
                }
            }
            elseif($mois > $moisA){
                offreT($don['idOffre'], $don['idConducteur'], $don['horaireArrivee']);
            }
        }
        elseif($anne > $anneeA){
            offreT($don['idOffre'], $don['idConducteur'], $don['horaireArrivee']);
        }
        echo "\n";
    }

?>

</div>

	<div class="text-center">
        <font size="10"><p><span style="color:Navy">Où souhaitez-vous aller<?php 
        
        // on vérifie si l'utilisateur est connecté
        $session_active = $this->request->getAttribute('identity');
    
        // ajout du prénom
        if (!is_null($session_active))
            echo ', ' . $session_active->prenom;
        ?>
        
        ?</span></p></font>
        <div style="background-color:#AFEEEE;">
            <div class="container">
                <br>
                <form action="Offre" method="GET">
                    <div class="row">
                        <div class="col-sm-4">
                            <h6>Départ</h6>
                            <input  name="villeDepart" id="villeDepart" placeholder="Départ" type="text" class="form-control" style="background-color:DarkCyan; color:white">
                        </div>
                        <div class="col-sm-4">
                            <h6>Destination</h6>
                            <input  name="villeDarrivee" id="villeDarrivee" type="text" class="form-control" placeholder="Destination"  style="background-color:DarkCyan; color:white">
                        </div>
                        <div class="col-sm-4">
                            <h6>Date de départ</h6>
                            <input type="date" id="horaireDepart" name="horaireDepart" value="" style="background-color:DarkCyan; color:white">
                        </div>
                        <div class="col-sm-4">
                            <h6>Nombre de passagers</h6>
                            <input type="number" id="nombrePassagersMax"  placeholder="nb passagers"  name="nombrePassagersMax" min="1" max="100" style="background-color:DarkCyan; color:white">
                        </div>
                        <div class="col-sm-4">
                            <h6></h6>
                            <button type="Submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Rechercher</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

<script> $("#villeDepart").autocomplete({
	source: function (request, response) {
		$.ajax({
			url: "https://api-adresse.data.gouv.fr/search/?city="+$("input[name='villeDepart']").val(),
			data: { q: request.term },
			dataType: "json",
			success: function (data) {
				var cities = [];
				response($.map(data.features, function (item) {
					// Ici on est obligé d'ajouter les villes dans un array pour ne pas avoir plusieurs fois la même
					if ($.inArray(item.properties.postcode, cities) == -1) {
						cities.push(item.properties.postcode);
						return { label: item.properties.city + "-" + item.properties.postcode , 
								 value: item.properties.city
						};
					}
				}));
			}
		});
	}
});

$("#villeDarrivee").autocomplete({
	source: function (request, response) {
		$.ajax({
			url: "https://api-adresse.data.gouv.fr/search/?city="+$("input[name='villeDarrivee']").val(),
			data: { q: request.term },
			dataType: "json",
			success: function (data) {
				var cities = [];
				response($.map(data.features, function (item) {
					// Ici on est obligé d'ajouter les villes dans un array pour ne pas avoir plusieurs fois la même
					if ($.inArray(item.properties.postcode, cities) == -1) {
						cities.push(item.properties.postcode);
						return { label: item.properties.city + "-" + item.properties.postcode ,  
								 value: item.properties.city
						};
					}
				}));
			}
		});
	}
});
</script>
	</div>


<body>
<br>

<div class="text-center">
<?php echo $this->Html->image('Accueil2.jpg', ['alt' => 'Accueil']); ?>
	<br>
	<div class="panel panel-primary">
		<div class="panel-body">
			<h2><span class="glyphicon glyphicon-road"></span> Se déplacer en France en réduisant le coût du voyage, ainsi qu'en réduisant la polution du monde ? C'est désormais possible avec le Co-Voiturage.<h2>
		</div>
	</div>
	
</div>

<div class="container">
	<div class="text-center">
		<h3>Vous souhaitez utiliser votre véhicule ? Pas de problème ! </h3>
		<a href="AjouterUneOffre" class="btn btn-default btn-lg " role="button" aria-disabled="true"><?php echo $this->Html->image('AjoutPublique.jpg', ['alt' => 'AjoutPublic']); ?><font size="5">Proposer une nouvelle offre de trajet publique</font></a> <br><br>
        <?php
            if (!is_null($session_active)){
                $idMembre=$session_active->idMembre;

                //Recherche des groupes
                $donnees = $conn->execute($requete="SELECT * FROM `groupemembre` WHERE idUtilisateur=".$idMembre)->fetchAll('assoc');
                
                $admOuMembr = 0;
		
                foreach($donnees as $don){
                    $admOuMembr++;
                    $tabl[] = $don['idGroupe'];
                }

                if($admOuMembr != 0){ 
            
        ?>
		            <a href="AjouterOffrePrivee" class="btn btn-default btn-lg " role="button" aria-disabled="true"><?php echo $this->Html->image('AjoutPrivée.jpg', ['alt' => 'AjoutPrivee']); ?><font size="5">Proposer une nouvelle offre de trajet privée</font></a>
        <?php
                }
            }
        ?>
    </div>
	<br>
	<div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h3>Ajouter une offre publique</h3>        
                <p>Vous souhaitez voyager avec votre véhicule mais vous ne <b>connaissez personne ?</b></p>
                <p><br><a href="AjouterUneOffre"><span class="glyphicon glyphicon-plus"></span> Ajoutez une offre publique</a> avec toutes vos informations de voyage et les conditions de voyage. Ensuite attendez.</p>
                <p><br><span class="glyphicon glyphicon-eye-open"></span> Vérifiez vos mails et vos <a href="notification">notifications</a> sur le site, si quelqu'un est interressé par votre annonce, vous serez signalé
                    et vous pourrez choisir d'accepter cette personne ou de la refuser dans votre voiture.</p>
                <p><br><span class="glyphicon glyphicon-ok"></span> Et voilà ! Le tour est joué.</p>
            </div>
            <div class="col-sm-4">
                <h3>Rechercher une offre</h3>
                <p>Vous souhaitez voyager sans utiliser votre véhicule ou vous n'avez pas de véhicule et ne <b>connaissez personne ?</b></p>
                <p><br><a href="offre"><span class="glyphicon glyphicon-search"></span> Recherchez une offre publique</a>. Filtrez les offres et signalez votre intérêt. Ensuite attendez que votre demande soit validée.</p>
                <p><br><span class="glyphicon glyphicon-ok"></span> Demande validée. Et voilà le tour est joué. Vous pouvez voyager !</p>
            </div>
            <div class="col-sm-4">
                <h3>Ajouter une offre privée</h3>
                <p>Vous avez déjà un compte ? Vous souhaitez voyager avec des personnes que vous connaissez ? </p>
                <p><br><?php if (!is_null($session_active)){ if($admOuMembr != 0){ ?><a href="AjouterOffrePrivee"><span class="glyphicon glyphicon-plus"></span> Ajoutez une offre privée</a><?php } else {?><a href="VisuGroupe"><span class="glyphicon glyphicon-plus"></span> Ajoutez une offre privée</a><?php }} else {?><a href="VisuGroupe"><span class="glyphicon glyphicon-plus"></span> Ajoutez une offre privée</a><?php }?>, choisissez le groupe de personne à qui envoyer la demande. Et patientez.</p>
                <p><br><span class="glyphicon glyphicon-eye-open"></span> Vérifiez vos mail et vos  <a href="notification">notifications</a> sur le site, si quelqu'un est interressé par votre annonce, vous serez signalé.</p>
                <p><br><span class="glyphicon glyphicon-ok"></span> Et voilà ! Le tour est joué.</p>
            </div>
        </div>
    </div>
	<br>
    <font size="10"><p>Retrouvez des <b><span style="color:SteelBlue">centaines de convoitureurs près de chez</span></b> 
                        vous et profitez des <b><span style="color:SteelBlue">meilleurs prix</span></b> de voyage.</p></font>
</div>

<?php if (is_null($session_active)){
    ?>
<div  style="background-color:#AFEEEE;">
    <div class="text-center">
        <p> <font size="5">Vous n'avez pas encore de compte ? <a href="inscription">Inscrivez-vous</a> ! </font></p>
    </div>
</div>
<?php }
?>



	

</body>
