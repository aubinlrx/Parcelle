<h1>Editer le type de travail</h1>
<?php    
	echo $this->Form->create('WorkType', array('action' => 'editer'));
    echo $this->Form->hidden('id', array(
    	'type'	=> 'hidden'
	    ));
    echo $this->Form->input('label', array(
		'label'	=> 'Label du type de travail',
		'error'	=> array(
			'notEmpty'	=> __("Vous devez renseigner un label", true),
			'minLength'	=> __("Le label doit faire 5 caractères au minimum", true)
			)
		));      
    echo $this->Form->end('Modifier');
?>