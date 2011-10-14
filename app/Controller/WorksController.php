<?php 
	Class WorksController extends AppController {
	
		var $name = "Works";
		
		//var $scaffold;
		
		/*
		*	Function permettant d'afficher l'ensemble des travaux
		*/
		function index() {
		
			$this->set('works', $this->Work->find('all'));
		
		}
		
		/*
		*	Function permettant d'afficher un travail en particulier
		*	@param : $ id du travail que l'on souhaite afficher
		*/
		function afficher($id = null) {
		
			$this->Work->id = $id;
			$this->set('work', $this->Work->read());
		
		}
		
		/*
		*	Function permettant d'ajouter un nouveau travail
		*	!! Seulement disponible pour les administrateurs
		*/
		function admin_ajouter() {
		
			if ($this->request->is('post')) {
        	//If the form data can be validated and saved...
        		if ($this->Work->saveAll($this->request->data)) {
            	//Set a session flash message and redirect.
            		$this->Session->setFlash("Votre travail a bien été créé");
        		}
    		}

			$this->set('workTypes', $this->Work->WorkType->find('list', array('fields' => array('id', 'label'), 'order' => 'WorkType.label ASC')));
		
		}
		
		/*
		*	Function permettant de supprimer un travail
		*	!! Seulement disponible pour les administrateurs
		*	@param : $id de l'élément à supprimer
		*/
		function admin_supprimer($id) {
		
			$this->Work->delete($id);
			$this->Session->setFlash('Le travail a été supprimé');
		
		}
		
		/*
		*	Function permettant de modifier un travail
		*	!! Seulement disponible pour les administrateurs
		*	@param : $id de l'élément à modifier
		*/
		function admin_editer($id = null) {
		
			$this->set('workTypes', $this->Work->WorkType->find('list', array('fields' => array('id', 'label'), 'order' => 'WorkType.label ASC')));
		
			if(empty($this->data)){
				$this->Work->id = $id;
				$this->data = $this->Work->read();
			} else {
				if ($this->request->is('post')) {
	        	//If the form data can be validated and saved...
	        		if ($this->Work->saveAll($this->request->data['Work'])) {
	            	//Set a session flash message and redirect.
	            		$this->Session->setFlash("Votre travail a bien été modifié");
	        		}
	    		}
			}
		}
		
	}

?>