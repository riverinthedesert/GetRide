<!DOCTYPE html>
<html lang="fr">

<head>
	<title>Se connecter</title>
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
	                    print_r($_SESSION['Auth']['idMembre']);
                		echo "ok";
	                ?>
	            </fieldset>
	            <?= $this->Form->button(__('Submit')) ?>
	            <?= $this->Form->end() ?>
	        </div>
	    </div>
	</div>


</body>

</html>


