<?php 
	Class UsersController extends AppController {
	
		var $name = "Users";
		
		//var $scaffold;

		function index(){
		
		}
		
		function admin_home(){
		
			
		}

		
		/*
		*	Fonction d'ajout d'un nouvel utilisateur
		*/
		function ajouter(){
		
			if ($this->request->is('post')) {
        	//If the form data can be validated and saved...
        		if ($this->User->save($this->data)) {
            	//Set a session flash message and redirect.
            		$this->Session->setFlash("Votre utilisateur a bien été créé");
            		$this->redirect('/admin');
        		}
    		}

    		//If no form data, find the recipe to be edited
    		//and hand it to the view.
    		$this->set('groups', $this->User->Group->find('list', array('fields' => array('id', 'name'), 'order' => 'Group.name ASC')));
		}
		
		/*
		*	Fonction de suppression d'un utilisateur
		*/
		function admin_supprimer($id){
			
		}
		
		/*
		*	Fonction permettant la gestion du login
		*	à l'aide du component AppAuth > réecriture
		*	du composant Auth de cakephp.
		*/
		function login(){
			if ($this->request->is('post')) {
        		if ($this->AppAuth->login()) {
            		$this->redirect($this->AppAuth->redirect());
        		} else {
            		 $this->Session->setFlash(__('Votre identifiant ou mot de passe est incorrect'), 'default', array(), 'auth');
        		}
    		}
		}

		/*
		*	Fonction permettant la déconnexion d'un utilisateur
		*/
		function logout(){
			
			$this->redirect($this->AppAuth->logout());
		}

	}

?>