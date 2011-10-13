<?php 

	Class PlotInformation extends AppModel {
		
		var $name = "PlotInformation";
		
		var $belongsTo = "Plot";

		/*
		*	Différentes méthodes de validation du formulaire
		*/
		var $validate = array(
			'surface'	=> array(
				'notEmpty'	=> array('rule'	=> 'notEmpty', 'allowEmpty'	=> false, 'required' => true)
				),
			'commune'	=> array(
				'notEmpty'	=> array('rule'	=> 'notEmpty', 'allowEmpty' => false, 'required' => true)
				),
			'section'	=> array(
				'notEmpty'	=> array('rule'	=> 'notEmpty', 'allowEmpty' => false, 'required' => true),
				'maxLength'	=> array('rule' => array('maxLength', 2))
				),
			'numero'	=> array(
				'notEmpty'	=> array('rule' => 'notEmpty', 'allowEmpty' => false, 'required' => true),
				'minLength'	=> array('rule' => array('minLength', 4)),
				'maxLength'	=> array('rule'	=> array('maxLength', 4))
				),
			);
		
	}
	
?>