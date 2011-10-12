<h1>Editer les informations de la parcelle</h1>
<?php    
	echo $this->Form->create('PlotInformation', array('action' => 'editer'));
    echo $this->Form->hidden('id');
    echo $this->Form->input('surface');
    echo $this->Form->input('commune');
	echo $this->Form->input('section');
	echo $this->Form->input('numero'),
    echo $this->Form->input('gps');        
    echo $this->Form->end('Modifier');
?>