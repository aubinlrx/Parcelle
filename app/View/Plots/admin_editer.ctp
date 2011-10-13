<h1>Editer une Parcelle</h1>
<?php 
	echo $this->Form->create('Plot', array('action' => 'editer'));
	
	echo $this->Form->input('Plot.id');
	echo $this->Form->input('Plot.label', array(
		'label'	=> 'Nom de la parcelle',
		'error'	=> array(
			'notEmpty'	=> __("Le champs ne doit pas être vide")
			)
		));
	
	//HasOne - PlotInformations
	echo $this->Form->input('PlotInformation.surface', array(
		'label'	=> 'Surface de la parcelle (hectar)',
		'error' =>	array(
			'notEmpty'	=> __("Vous devez spécifier la surface", true)
			)
		));
	echo $this->Form->input('PlotInformation.commune', array(
		'label'	=> 'Cadastre : Commune',
		'error'	=> array(
			'notEmpty'	=> __("Vous devez spécifie la commune", true)
			)
		));
	echo $this->Form->input('PlotInformation.section', array(
		'label'	=> 'Cadastre : Section',
		'error'	=> array(
			'notEmpty'	=> __("Vous devez spécifier la section", true),
			'maxLength'	=> __("Le champs doit comprendre deux lettres au maximum")
			)
		));
	echo $this->Form->input('PlotInformation.numero', array(
		'label'	=> 'Cadastre : Numéro',
		'error'	=> array(
			'notEmpty'	=> __("Vous devez spécifier le numéro", true),
			'minLength'	=> __("Le champs doit obligatoirement comprendre quatre chiffres", true),
			'maxLength'	=> __("Le champs doit obligatoirement comprendre quatre chiffres", true)
			)
		));
	echo $this->Form->input('PlotInformation.gps', array(
		'label'	=> 'Coordonnée GPS'
		));
	echo $this->Form->input('PlotInformation.location', array(
		'label' 	=> 'Type de parcelle',
		'options'	=> array('Metayage','Fermage','Propriété'),
		));
	
	echo $this->Form->end('Modifier');
?>