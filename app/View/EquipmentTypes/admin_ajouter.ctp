<h1>Ajouter une type d'équipment</h1>
<?php 
	echo $this->Form->create('EquipmentType');
	echo $this->Form->input('label', array(
		'label'	=> 'Label du type d\'équipement',
		'error'	=> array(
			'notEmpty'	=> __("Vous devez spécifier un label", true)
			)
	));
	echo $this->Form->end('Sauvegarder');

	
?>