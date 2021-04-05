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
 
<?= $this->Html->css(['trajetprivee']) ?>

	<div class="row">
	    <div class="column-responsive column-80">
	        <div class="membre form content">
	            <?= $this->Form->create($offre) ?>
	            <fieldset>
	                <legend align="center"><?= __('Ajouter un Trajet privee') ?></legend>
					<p1>
					<?= $this->Form->control('idVilleDepart', ['type' => 'number']) ?>
					</p1>
					<p2>
					<?= $this->Form->control('idVilleArrivee', ['type' => 'number']) ?>
					</p2>
					<p4>
					<?= $this->Form->control('horaireDepart', ['pattern' => '^(\d{4}-\d{1,2}-\d{1,2}\s\d{1,2}:\d{1,2}:\d{1,2})$',
	                                                      'required title' => "Ce champ doit impérativement contenir une date de départ valide !"]) ?>
					</p4>
					<p5>
					<?= $this->Form->control('horaireArrivee', ['pattern' => '^(\d{4}-\d{1,2}-\d{1,2}\s\d{1,2}:\d{1,2}:\d{1,2})$',
	                                                         'required title' => "Ce champ doit impérativement contenir une date d'arrivée valide !"]) ?>
					</p5>
					<p6>
					<?= $this->Form->control('nbPassagersMax', ['type' => 'number',
	                                                             'pattern' => '^[0-9]*[1-9][0-9]*$',
	                                                             'required title' => "Merci de saisir un nombre supérieur ou égal à 1."]) ?>
					</p6>
					<p7>
					<?= $this->Form->control('prix', ['type' => 'number']) ?>
					</p7>
					<p3>
					<?= $this->Form->control('idetapes1', ['type' => 'string']) ?>
					<?= $this->Form->control('idetapes2', ['type' => 'string']) ?>
					<?= $this->Form->control('idetapes3', ['type' => 'string']) ?>
					</p3>
					<p8>
					<?= $this->Form->control('precisionLieu', ['type' => 'string']) ?>
					</p8>
					<p9>
					<?= $this->Form->control('commentaire', ['type' => 'string']) ?>
					</p9>
	                <?php
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