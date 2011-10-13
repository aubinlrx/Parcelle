<?php 

	Class EquipmentType extends AppModel {
		
		var $name = "EquipmentType";
		
		var $hasMany = "Equipment";

		/*
		*	Différentes méthodes de validation du formulaire
		*/
		var $validate = array(
			'label'	=> array(
				'notEmpty'	=> array('rule' => 'notEmpty', 'allowEmpty' => false, 'required' => true)
				)
			);	
		
	}
	
?>