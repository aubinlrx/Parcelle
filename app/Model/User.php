<?php 
	App::uses('AuthComponent', 'Controller/Component');
	Class User extends AppModel {
		
		var $name = "User";
		
		var $belongsTo = array('Group');

		/*
		*	Différentes méthodes de validation du formulaire
		*/
		var $validate = array(
				'login'	=>	array(
					'regle-login'	=>	array('rule' => 'notEmpty', 'allowEmpty' => false, 'required' => true),
					'minLength'		=> 	array('rule' => array('minLength', 4)),
					'isUnique'		=> 	array('rule' => 'isUnique')
					),
				'email'	=> array(
					'notEmpty'	=>	array('rule' => 'notEmpty', 'allowEmpty' => false, 'required' => true),
					'email'		=> 	array('rule'	=> 'email'),
					'isUnique'	=> 	array('rule' => 'isUnique')
					),
				'password'	=> array(
					'minLength'	=> array('rule' => array('minLength', 8), 'allowEmpty' => false, 'required' => true),
					'notEmpty'	=> array('rule' => 'notEmpty')
					),
				'password_confirm'	=>	array(
					'comparePassword'	=>	array('rule' => array('comparePassword', 'password'), 'allowEmpty' => false, 'required' => true)
					)
			);
		
		/*
		*	Function de validation du mot de passe par comparaison
		*/
		function comparePassword($field = array(), $compare_field = null){
			
			foreach ($field as $key => $value) {
				$pass_1 = $value;
				$pass_2 = $this->data[$this->name][$compare_field];

				if ($pass_1 !== $pass_2) {
					return false;
				}else {
					continue;
				}
			}
			return true;
		}

		/*
		*	Function permettant l'hashage du mot de passe.
		*	Se lance avant la sauvegarde en BDD.
		*/
		public function beforeSave() {
        	$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        	return true;
    	}
		
	}
	
?>