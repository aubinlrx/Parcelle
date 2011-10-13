<h1>Editer le type d'équipement</h1>
<?php    
	echo $this->Form->create('EquipmentType', array('action' => 'editer'));
    echo $this->Form->input('id', array(
    	'type'	=> 'hidden'
	));
    echo $this->Form->input('label', array(
		'label'	=> 'Label du type d\'équipement',
		'error'	=> array(
			'notEmpty'	=> __("Vous devez spécifier un label", true)
			)
	));       
    echo $this->Form->end('Modifier');
?>