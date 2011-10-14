<?php 

	Class Worker extends AppModel {
		
		var $name = "Worker";
		
		var $hasAndBelongsToMany = "Task";
		
		var $validate = array(
			'nom' => array(
				'notEmpty'	=> array('rule' => 'notEmpty', 'allowEmpty'	=> false, 'required' => true),
				'minLength'	=> array('rule' => array('minLength', 3)),
				'alpha'		=> array('rule'	=> '/^[a-zA-Z]{3,}$/i')
				), 
			'prenom' => array(
				'notEmpty'	=> array('rule' => 'notEmpty', 'allowEmpty'	=> false, 'required' => true),
				'minLength'	=> array('rule' => array('minLength', 2)),
				'alpha'		=> array('rule'	=> '/^[a-zA-Z]{3,}$/i')
			)
		);
		
	}
	
?>