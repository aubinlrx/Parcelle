
<h1>Ajouter un Equipment</h1>
<?php 
	echo $this->Form->create('Equipment');
	echo $this->Form->input('Equipment.id', array(
		'type'	=> 'hidden'
		));
	echo $this->Form->input('Equipment.label', array(
		'label'	=> 'Label de l\'équipement',
		'error'	=> array(
			'notEmpty'	=> __("Le champs ne doit pas être vide", true)
			)	
		));
	echo $this->Form->input('Equipment.modele', array(
		'label'	=> 'Model de l\'équipement',
		'error'	=> array(
			'notEmpty'	=> __("Un modèle doit être spécifié", true)
			)
		));
	echo $this->Form->input('Equipment.marque', array(
		'label'	=> 'Marque de l\'équipement',
		'error'	=> array(
			'notEmpty'	=> __("Une marque doit être spécifiée", true)
			)
		));
	echo $this->Form->input('Equipment.achat', array(
		'label'	=> 'Date d\'achat'
		));
	echo $this->Form->input('Equipment.equipment_type_id', array(
		'label'	=> 'Type de l\'équipement'
		));
	echo $this->Form->end('Sauvegarder');
?>