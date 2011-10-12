<h1>Ajouter une parcelle</h1>
<?php 
	echo $this->Form->create('Plot');
	
	echo $this->Form->input('Plot.id');
	echo $this->Form->input('Plot.label');
	
	//HasOne - PlotInformations
	echo $this->Form->input('PlotInformations.surface');
	echo $this->Form->input('PlotInformations.commune');
	echo $this->Form->input('PlotInformations.section');
	echo $this->Form->input('PlotInformations.numero');
	echo $this->Form->input('PlotInformations.gps');
	
	echo $this->Form->end('Sauvegarder');
?>