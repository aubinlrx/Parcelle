<h1>Ajouter une parcelle</h1>
<?php 
	echo $this->Form->create('PlotInformation');
	echo $this->Form->input('surface');
	echo $this->Form->input('commune');
	echo $this->Form->input('section');
	echo $this->Form->input('numero'),
	echo $this->Form->input('gps');
	echo $this->Form->input('location');
	echo $this->Form->end('Sauvegarder');
?>