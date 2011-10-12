<?php 
	Class UsersController extends AppController {
	
		var $name = "Users";
		
		//var $scaffold;
		
		function index(){
		
		}
		
		function admin_home(){
		
			
		}
		
		function ajouter(){
		
			$this->set('groups', $this->User->Group->find('list', array('fields' => array('id', 'name'), 'order' => 'Group.name ASC')));
		
			if(!empty($this->request->data)) {
				if($this->User->saveAll($this->request->data)){
					$this->flash('Votre utilisateur a bien été créé', '/users');
				}
				
			}
		}
		
		function admin_supprimer($id){
			
		}
		
		function login(){
			if ($this->request->is('post')) {
        		if ($this->AppAuth->login()) {
            		$this->redirect($this->AppAuth->redirect());
        		} else {
            		 $this->Session->setFlash(__('Votre identifiant ou mot de passe est incorrect'), 'default', array(), 'auth');
        		}
    		}
		}
		
		function logout(){
			
			$this->redirect($this->AppAuth->logout());
		}
	}

?>