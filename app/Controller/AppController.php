<?php 
	
	class AppController extends Controller {
		
		public $components = array('AppAuth', 'Session');

		function beforeFilter() {
        	
            //Configure AuthComponent
        	
        	/*$this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        	$this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
        	$this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'index'); 

			$this->Auth->authenticate = array(
            	AuthComponent::ALL => array(
                	'fields' => array(
                    	'username' => 'login',
                    	'password' => 'password'),
                	'userModel' => 'Users.User',
            	), 'Form'
        	);

            $configs = array(
                'Auth' => array(
                    'authenticate' => array(
                        'Form' => array(
                            'fields' => array(
                                'username' => 'login',
                                'password' => 'password'
                            ),
                            'userModel' => 'Users.User'
                        )
                    ),
                    'loginAction' => array(),
                    'logoutRedirect' => array(),
                    'loginRedirect' => array(),
                )
                
            )*/
        	
    	}
		
	}
	
?>