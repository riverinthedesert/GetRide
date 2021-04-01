<style>
body {
	background: WhiteSmoke  no-repeat center top;
}

</style>

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
                <div class="row">
                    <div class="col-sm-4">
                        <input type="text" class="form-control" value="Départ" style="background-color:DarkCyan; color:white">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" value="Destination" style="background-color:DarkCyan; color:white">
                    </div>
                    <div class="col-sm-4">
                        <input type="date" id="start" name="trip-start" value="" style="background-color:DarkCyan; color:white">
                    </div>
                    <div class="col-sm-4">
                        <input type="number" id="tentacles" name="tentacles" min="1" max="100" style="background-color:DarkCyan; color:white">
                    </div>
                    <div class="col-sm-4">
                        <button type="Submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Rechercher</button>
                    </div>
                </div>
            </div>
        </div>
	</div>


<body>
<br>

<div class="text-center">
<?php echo $this->Html->image('Accueil2.jpg', ['alt' => 'Accueil']); ?>
	<br>
	<div class="panel panel-primary">
		<div class="panel-body">
			<h2><span class="glyphicon glyphicon-road"></span> Se déplacer en France en réduisant le coût du Voyage, ainsi qu'en réduisant la polution du monde ? C'est désormais possible avec le Co-Voiturage.<h2>
		</div>
	</div>
	
</div>

<div class="container">
	<div class="text-center">
		<h3>Vous souhaitez utiliser votre véhicule ? Pas de problème ! </h3>
		<a href="/GetRide/GetRide/offre/add" class="btn btn-default btn-lg " role="button" aria-disabled="true"><?php echo $this->Html->image('AjoutPublique.jpg', ['alt' => 'AjoutPublic']); ?><font size="5">Proposer une nouvelle offre de trajet publique</font></a> <br><br>
		<a href="/GetRide/GetRide/offre/add" class="btn btn-default btn-lg " role="button" aria-disabled="true"><?php echo $this->Html->image('AjoutPrivée.jpg', ['alt' => 'AjoutPrivee']); ?><font size="5">Proposer une nouvelle offre de trajet privée</font></a>
	</div>
	<br>
	<div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h3>Ajouter une offre publique</h3>        
                <p>Vous souhaiter voyager avec votre véhicule mais vous ne <b>connaissez personne ?</b></p>
                <p><br><a href="/GetRide/GetRide/offre/add"><span class="glyphicon glyphicon-plus"></span> Ajoutez une offre publique</a> avec toutes vos informations de voyage et les conditions de voyage. Ensuite attendez.</p>
                <p><br><span class="glyphicon glyphicon-eye-open"></span> Vérifiez vos mail et vos <a href="/GetRide/GetRide/notification">notifications</a> sur le site, si quelqu'un est interressé par votre annonce, vous serez signalé
                    et vous pourrez choisir d'accepter cette personne ou de la refuser dans votre voiture.</p>
                <p><br><span class="glyphicon glyphicon-ok"></span> Et voilà ! Le tour est joué.</p>
            </div>
            <div class="col-sm-4">
                <h3>Rechercher une offre</h3>
                <p>Vous souhaiter voyager sans utiliser votre véhicule ou vous n'avez pas de véhicule et ne <b>connaissez personne ?</b></p>
                <p><br><a href="/GetRide/GetRide/offre"><span class="glyphicon glyphicon-search"></span> Recherchez une offre publique</a>. Filtrez les offres et signalez votre intérêt. Ensuite attendez que votre demande soit validée.</p>
                <p><br><span class="glyphicon glyphicon-ok"></span> Demande validée. Et voilà le tour est joué. Vous pouvez voyager !</p>
            </div>
            <div class="col-sm-4">
                <h3>Ajouter une offre privée</h3>
                <p>Vous avez déjà un compte ? Vous souhaitez voyager avec des personnes que vous connaissez ? </p>
                <p><br><a href="/GetRide/GetRide/offre/add"><span class="glyphicon glyphicon-plus"></span> Ajoutez une offre privée</a>, choisissez le groupe de personne à qui envoyer la demande. Et patientez.</p>
                <p><br><span class="glyphicon glyphicon-eye-open"></span> Vérifiez vos mail et vos  <a href="/GetRide/GetRide/notification">notifications</a> sur le site, si quelqu'un est interressé par votre annonce, vous serez signalé.</p>
                <p><br><span class="glyphicon glyphicon-ok"></span> Et voilà ! Le tour est joué.</p>
            </div>
        </div>
    </div>
	<br>
    <font size="10"><p>Retrouvez des <b><span style="color:SteelBlue">centaines de convoitureurs près de chez</span></b> 
                        vous et profitez des <b><span style="color:SteelBlue">meilleurs prix</span></b> de voyage.</p></font>
</div>

<div  style="background-color:#AFEEEE;">
    <div class="text-center">
        <p> <font size="5">Vous n'avez pas encore de compte ? <a href="/GetRide/GetRide/inscription">Inscrivez-vous</a> ! </font></p>
    </div>
</div>




	

</body>
