<?php

	App::uses('AuthComponent', 'Controller/Component');


	
	class AppAuthComponent extends AuthComponent {
	
		/********
		*	Configuration par défaut
		*
		*	@var array
		*/
		var $defaults = array(    
           	'authenticate' => array(
                'Form' => array(
                  	'fields' => array(
                    	'username' => 'login',
                    	'password' => 'password'
                    ),
                    'userModel' => 'Users.User'
                )
            ),
            'loginAction' => array('controller' => 'users', 'action' => 'login', 'admin' => false),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
            'loginRedirect' => array('controller' => 'users', 'action' => 'index')
        );
		
		/********
		*	Configuration possible en fonction des préfixs de la route
		*
		*	@var array
		*/
		var $configs = array(
			'admin' => array(    
           	'authenticate' => array(
                'Form' => array(
                  	'fields' => array(
                    	'username' => 'login',
                    	'password' => 'password'
                    ),
                    'userModel' => 'Users.User'
                )
            ),
            'loginAction' => array('controller' => 'users', 'action' => 'login', 'admin' => false),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
            'loginRedirect' => array('controller' => 'users', 'action' => 'index')
            ));
	
	
		/**
	 	* Démarrage du composant.
	 	* Autorisation si pas de préfixe dans la Route qui a conduit ici.
	 	*
	 	* @param object $controller Le contr™leur qui a appelé le composant.
	 	*/
		function startup(&$controller){

			//echo debug($controller);
		
			$prefix = null;
 
			if(empty($controller->request->params['prefix'])) {
				$this->allow();
			} else {
				$prefix = $controller->request->params['prefix'];
			}
 	
			// Cas spécial des actions de login et logout, pour lesquelles le préfixe n'existe pas
			if(in_array($controller->request->action, array('login', 'logout'))) {
				switch($controller->name)
				{
					case 'Users':
						$prefix = 'admin';
						break;
					
					
				}
			}
	 
			$this->_setup($prefix);
	 
			parent::startup($controller);
		}
	 
		/**
		 * Définition des variables de config en fonction d'un préfixe
		 *
		 * @param string $prefix
		 */
		function _setup($prefix){
			
			$settings = $this->defaults;
	 
			if(array_key_exists($prefix, $this->configs)) {
				$settings = array_merge($settings, $this->configs[$prefix]);
			}
			$this->_set($settings);
		}
		
	}

?>