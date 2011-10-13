<?php 
	Class Plot extends AppModel {
		
		var $name = 'Plot';

		var $hasOne = 'PlotInformation';

		/*
		*	Différentes méthodes de validation du formulaire
		*/
		var $validate = array(
			'label' => array(
				'notEmpty'	=> array('rule' => 'notEmpty', 'allowEmpty' => false, 'required' => true)
				)
			);

	}

?>