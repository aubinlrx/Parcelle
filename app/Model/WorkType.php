<?php 

	Class WorkType extends AppModel {
		
		var $name = "WorkType";
		
		var $hasMany = "Work";
		
		var $validate = array(
			'label'	=> array(
				'notEmpty' 	=> array('rule' => 'notEmpty', 'allowEmpty' => false, 'required' => true),
				'minLength'	=> array('rule' => array('minLength', 5))
		));	
	}
	
?>