<?php 

	Class Work extends AppModel {
		
		var $name = "Work";
		
		var $belongsTo = "WorkType";
		
		var $hasAndBelongsToMany = "Task";

		/*
		*	Différentes méthodes de validation du formulaire
		*/
		var $validate = array(
			'label'	=> array(
				'notEmpty'	=> array('rule'	=> 'notEmpty', 'allowEmpty' => false, 'required' => true),
				'minLength'	=> array('rule' => array('minLength', 5))
				),
			'work_type_id'	=> array(
				'notEmpty'	=> array('rule' => 'notEmpty', 'allowEmpty' => false, 'required' => true)
				)
			);
		
	}
	
?>