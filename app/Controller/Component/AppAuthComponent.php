<?php

	App::uses('AuthComponent', 'Controller/Component');


	
	class AppAuthComponent extends AuthComponent {
	
		/********
		*	Configuration par d�faut
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
		*	Configuration possible en fonction des pr�fixs de la route
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
	 	* D�marrage du composant.
	 	* Autorisation si pas de pr�fixe dans la Route qui a conduit ici.
	 	*
	 	* @param object $controller Le contr�leur qui a appel� le composant.
	 	*/
		function startup(&$controller){

			//echo debug($controller);
		
			$prefix = null;
 
			if(empty($controller->request->params['prefix'])) {
				$this->allow();
			} else {
				$prefix = $controller->request->params['prefix'];
			}
 	
			// Cas sp�cial des actions de login et logout, pour lesquelles le pr�fixe n'existe pas
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
		 * D�finition des variables de config en fonction d'un pr�fixe
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