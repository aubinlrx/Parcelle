<h1>Ajouter un Equipment</h1>
<?php 
	echo $this->Form->create('Equipment');
	echo $this->Form->input('Equipment.id');
	echo $this->Form->input('Equipment.label');
	echo $this->Form->input('Equipment.modele');
	echo $this->Form->input('Equipment.marque');
	echo $this->Form->input('Equipment.achat');
	echo $this->Form->input('Equipment.equipment_type_id');
	echo $this->Form->end('Sauvegarder');
?>