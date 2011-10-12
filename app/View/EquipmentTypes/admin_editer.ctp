<h1>Editer le type d'Žquipement</h1>
<?php    
	echo $this->Form->create('EquipmentType', array('action' => 'editer'));
    echo $this->Form->hidden('id');
    echo $this->Form->input('label');        
    echo $this->Form->end('Modifier');
?>