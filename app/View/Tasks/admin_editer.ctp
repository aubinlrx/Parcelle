<h1>Modifier la tâche</h1>
<?php
	$task_id = $this->request->data['Task']['id'];
	
	echo $this->Form->create('Task', array('action' => 'editer'));
	echo $this->Form->input('Task.date', array(
		'label'	=> 'Date de la tâche',
		'error'	=> array(
			'notEmpty'	=> __("La date ne peut pas être vide", true)
			)
		));
	
	//HasAndBelongToMany - Service du Device
	echo $this->Form->input('Task.id', array(
		'type' => 'hidden', 
		'value' => $task_id
		));
	echo $this->Form->input('Equipment', array(
		'label'	=> 'Equipement utilisé'
		));
	echo $this->Form->input('Plot', array(
		'label' => 'Parcelles réalisées',
		));
	echo $this->Form->input('Worker', array(
		'label'	=> 'Ouvriers ayant participés',
		));
	echo $this->Form->input('Work', array(
		'label'	=> 'Travaux réalisés',
		));
	
	echo $this->Form->end('Sauvegarder');

?>