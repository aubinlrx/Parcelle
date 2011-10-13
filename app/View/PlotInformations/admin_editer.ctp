<h1>Editer les informations de la parcelle</h1>
<?php    
	echo $this->Form->create('PlotInformation', array('action' => 'editer'));
    echo $this->Form->hidden('id');
    cho $this->Form->input('surface', array(
		'label'	=> 'Surface de la parcelle (hectar)',
		'error' =>	array(
			'notEmpty'	=> __("Vous devez spécifier la surface", true)
			)
		));
	echo $this->Form->input('commune', array(
		'label'	=> 'Cadastre : Commune',
		'error'	=> array(
			'notEmpty'	=> __("Vous devez spécifie la commune", true)
			)
		));
	echo $this->Form->input('section', array(
		'label'	=> 'Cadastre : Section',
		'error'	=> array(
			'notEmpty'	=> __("Vous devez spécifier la section", true),
			'maxLength'	=> __("Le champs doit comprendre deux lettres au maximum")
			)
		));
	echo $this->Form->input('numero', array(
		'label'	=> 'Cadastre : Numéro',
		'error'	=> array(
			'notEmpty'	=> __("Vous devez spécifier le numéro", true),
			'minLength'	=> __("Le champs doit obligatoirement comprendre quatre chiffres", true),
			'maxLength'	=> __("Le champs doit obligatoirement comprendre quatre chiffres", true)
			)
		));
	echo $this->Form->input('gps', array(
		'label'	=> 'Coordonnée GPS'
		));
	echo $this->Form->input('location', array(
		'label' 	=> 'Type de parcelle',
		'options'	=> array('Metayage','Fermage','Propriété'),
		));        
    echo $this->Form->end('Modifier');
?>