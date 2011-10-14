<h1>Ajouter Ouvrier</h1>
<?php 
	echo $this->Form->create('Worker');
	echo $this->Form->input('nom', array(
    	'label' 	=> 'Nom',
    	'error' 	=> array(
    		'notEmpty'	=> __("Vous devez renseigner un nom", true),
    		'minLength'	=> __("Ce champs doit contenir au moins 3 lettres", true),
    		'alpha'		=> __("Ce champs ne doit comprendre que des lettres", true)
	    	)
	    ));    
    echo $this->Form->input('prenom', array(
    	'label'		=> 'Prénom',
    	'error'		=> array(
    		'notEmpty'	=> __("Vous devez renseigner un prénom", true),
    		'minLength'	=> __("Ce champs doit contenir au moins 2 lettres", true),
    		'alpha'		=> __("Ce champs ne doit comprendre que des lettres", true)
	    	)
	    )); 
	echo $this->Form->end('Sauvegarder');
?>