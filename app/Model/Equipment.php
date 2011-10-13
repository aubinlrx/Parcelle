<?php 

	Class Equipment extends AppModel {
		
		var $name = "Equipment";
		
		var $belongsTo = "EquipmentType";
		
		var $hasAndBelongsToMany = "Task";

		/*
		*	Différentes méthodes de validation du formulaire
		*/
		var $validate = array(
			'label'		=> array(
				'notEmpty'	=> array('rule' => 'notEmpty', 'allowEmpty' => false, 'required' => true)
				),
			'modele'	=> array(
				'notEmpty'	=> array('rule' => 'notEmpty', 'allowEmpty' => false, 'required' => true)
				),
			'marque'	=> array(
				'notEmpty'	=> array('rule' => 'notEmpty', 'allowEmpty' => false, 'required' => true)
				)
			);
		
	}
	
?>