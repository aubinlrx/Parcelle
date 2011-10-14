<h1>Ajouter Travaille</h1>
<?php 
	echo $this->Form->create('Work');
	echo $this->Form->input('id', array(
		'type'	=> 'hidden'
		));
	echo $this->Form->input('label', array(
		'label'	=> 'Label du travail',
		'error'	=> array(
			'notEmpty'	=> __("Vous devez renseigner un label", true),
			'minLength'	=> __("Le label doit contenir au moins 5 caractères", true)
			)
		));
	echo $this->Form->input('work_type_id', array(
		'label'	=>	'Type de travail'
		));
	echo $this->Form->end('Sauvegarder');
?>