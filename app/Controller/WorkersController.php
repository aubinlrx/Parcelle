<?php 
	Class WorkersController extends AppController {
	
		var $name = "Workers";
		
		//var $scaffold;
		
		/*
		*	Function permettant l'affichage de tous les ouvriers.
		*/
		function index() {
		
			$this->set('workers', $this->Worker->find('all'));
		
		}
		
		/*
		*	Function permettant d'afficher un ouvrier en particulier.
		*/
		function afficher($id = null) {
		
			$this->Worker->id = $id;
			$this->set('worker', $this->Worker->read());
		
		}
		
		/*
		*	Function permettant d'ajouter un nouvel ouvrier
		*	!! Seulement disponible pour les administrateurs
		*/
		function admin_ajouter() {
			
			if ($this->request->is('post')) {
        	//If the form data can be validated and saved...
        		if ($this->Worker->save($this->request->data)) {
            	//Set a session flash message and redirect.
            		$this->Session->setFlash("Votre utilisateur a bien été créé");
        		}
    		}
		}
		
		/*
		*	Function permettant de supprimer un ouvrier
		*	!! Seulement disponible pour les administrateurs
		*	@param : $id de l'ouvrier à supprimer
		*/
		function admin_supprimer($id) {
		
			$this->Worker->delete($id);
			$this->flash('L\'ouvrier a été supprimé', '/worker');
		
		}
		
		/*
		*	Function permettant de modifier un ouvrier
		*	!! Seulement disponible pour les administrateurs
		*	@param : $id de l'ouvrier à modifier
		*/
		function admin_editer($id = null) {
		
			if(empty($this->request->data)){
				$this->Worker->id = $id;
				$this->request->data = $this->Worker->read();
			} else {

				if ($this->request->is('post')) {
	        	//If the form data can be validated and saved...
	        		if ($this->Worker->save($this->request->data['Worker'])) {
	            	//Set a session flash message and redirect.
	            		$this->Session->setFlash("Votre utilisateur a bien été créé");
	        		}
	    		}
			}	
		
		}
		
	}

?>