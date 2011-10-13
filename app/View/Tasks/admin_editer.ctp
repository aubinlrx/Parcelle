<h1>Modifier la tâche</h1>
<?php
	$task_id = $this->request->data['Task']['id'];
	
	echo $this->Form->create('Task', array('action' => 'editer'));
	echo $this->Form->input('Task.date');
	
	//HasAndBelongToMany - Service du Device
	echo $this->Form->input('Task.id', array('type' => 'hidden', 'value' => $task_id));
	echo $this->Form->input('Equipment');
	echo $this->Form->input('Plot');
	echo $this->Form->input('Worker');
	echo $this->Form->input('Work');
	
	echo $this->Form->end('Sauvegarder');

?>