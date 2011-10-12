<h1>Editer un equipment</h1>
<?php 
	echo $this->Form->create('Equipment', array('action' => 'editer'));
	echo $this->Form->input('Equipment.id');
	echo $this->Form->input('Equipment.label');
	echo $this->Form->input('Equipment.modele');
	echo $this->Form->input('Equipment.marque');
	echo $this->Form->input('Equipment.achat');
	echo $this->Form->input('Equipment.equipment_type_id');
	echo $this->Form->end('Modifier');
?>