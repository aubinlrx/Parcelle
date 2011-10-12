<?php 

	Class Worker extends AppModel {
		
		var $name = "Worker";
		
		var $hasAndBelongsToMany = "Task";
		
		var $validate = array(
			'nom' => array(
				'rule' => array('minLength', 3)
				), 
			'prenom' => array(
				'rule' => array('minLength', 3)
			)
		);
		
	}
	
?>