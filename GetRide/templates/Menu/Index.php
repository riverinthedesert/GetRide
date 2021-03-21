<html>
	<head>
		<title>Navigation</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	</head>
	
	
	<?php
	$core="fonctionnalités :";
	echo $core;
	?>	
	

	<?= $this->Form->postButton(__('Offre'), ['action' => 'Offre']) ?>
	<?= $this->Form->postButton(__('VisuGroupe'), ['action' => 'VisuGroupe'])?>
	<?= $this->Form->postButton(__('VisuProfil'), ['action' => 'VisuProfil']) ?>


</html>

