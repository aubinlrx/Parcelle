<?php 
	Class PlotsController extends AppController {
	
		var $name = 'Plots';
		
		var $scaffold;
		
		/*
		*	Function permettant d'afficher l'ensemble des parcelles
		*/
		function index() {
		
			$this->set('plots', $this->Plot->find('all'));
		
		}
		
		/*
		*	Function permettant d'afficher une parcelle.
		*	@param : $id de la parcelle
		*/
		function afficher($id = null) {
		
			$this->Plot->id = $id;
			$this->set('plot', $this->Plot->read());
		
		}
		
		/*
		*	Function permettant d'ajouter une nouvelle parcelle.
		*	!! Seulement disponible pour les administrateurs
		*/
		function admin_ajouter() {

			if ($this->request->is('post')) {
        	//If the form data can be validated and saved...
        		if ($this->Plot->saveAll($this->request->data)) {
            	//Set a session flash message and redirect.
            		$this->Session->setFlash("Votre parcelle a bien été créé");
        		}
    		}
		}
		
		/*
		*	Function permettant de supprimer une parcelle. 
		*	!! Seulement disponible pour les administrateurs
		*	@param : $id de la parcelle
		*/
		function admin_supprimer($id) {
		
			$this->Plot->delete($id);
			$this->Session->setFlash('La parcelle a été supprimé');
		
		}
		
		/*
		*	Function permettant de d'éditer une parcelle.
		*	!! Seulement disponible pour les administrateurs
		*	@param : $id de la parcelle
		*/
		function admin_editer($id = null) {
		
			if(empty($this->request->data)){
				$this->Plot->id = $id;
				$this->request->data = $this->Plot->read();
			} else {

				if ($this->request->is('post')) {
	        	//If the form data can be validated and saved...
	        		if ($this->Plot->saveAll($this->request->data['Plot'])) {
	            	//Set a session flash message and redirect.
	            		$this->Session->setFlash("Votre parcelle a bien été modifié");
	        		}
	    		}
			}
		}

		
	}

?>