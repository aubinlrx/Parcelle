<?php 
	App::uses('AuthComponent', 'Controller/Component');
	Class User extends AppModel {
		
		var $name = "User";
		
		var $belongsTo = array('Group');

		public function beforeSave() {
        	$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        	return true;
    	}
		
	}
	
?>