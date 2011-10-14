<?php 

	Class Task extends AppModel {
		
		var $name = "Task";
		
		var $hasAndBelongsToMany = array(
			'Worker',
			'Plot', 
			'Work', 
			'Equipment'
		);

		/*
		*	Différentes méthodes de validation du formulaire
		*/
		var $validate = array(
			'date'	=> array(
				'notEmpty'	=> array('rule' => 'notEmpty', 'allowEmpty'	=> false, 'required' => true)
				)
			);
	}
	
?>