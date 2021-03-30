<!DOCTYPE html>
<html lang="fr">

<head>
	<title>Se connecter</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
 

	<div class="row">
	    <div class="column-responsive column-80">
	        <div class="membre form content">
	            <?= $this->Form->create($offre) ?>
	            <fieldset>
	                <legend align="center"><?= __('Ajouter une offre') ?></legend>
	                <?php
	                    echo $this->Form->control('horaireDepart', ['pattern' => '^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$',
	                                                      'required title' => "Ce champ doit impérativement contenir une date de départ valide !"]);
	                    echo $this->Form->control('horaireArrivee', ['pattern' => '^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$',
	                                                         'required title' => "Ce champ doit impérativement contenir une date d'arrivée valide !"]);
	                    echo $this->Form->control('nbPassagersMax', ['type' => 'number',
	                                                             'pattern' => '^[0-9]*[1-9][0-9]*$',
	                                                             'required title' => "Merci de saisir un nombre supérieur ou égal à 1."]);
	                    echo $this->Form->control('idVilleDepart', ['type' => 'number']);
	                    echo $this->Form->control('idVilleArrivee', ['type' => 'number']);
	                    echo $this->Form->control('prix', ['type' => 'number']);
	                    echo $this->Form->control('estPrivee', ['type' => 'checkbox']);
	               	    echo $this->Form->control('idConducteur', ['type' => 'number']);


	                ?>
	            </fieldset>
	            <?= $this->Form->button(__('Submit')) ?>
	            <?= $this->Form->end() ?>
	        </div>
	    </div>
	</div>


</body>

</html>


