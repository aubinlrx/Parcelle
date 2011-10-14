<?php 
	Class WorkTypesController extends AppController {
	
		var $name = "WorkTypes";
		
		//var $scaffold;
		
		/*
		*	Function permettant d'afficher l'ensemble des types de travail
		*/
		function index() {
		
			$this->set('workTypes', $this->WorkType->find('all'));
		
		}
		
		/*
		*	Function permettant d'afficher un type de travail en particulier
		*	@param : $id de lé?lément à afficher
		*/
		function afficher($id = null) {
		
			$this->WorkType->id = $id;
			$this->set('workType', $this->WorkType->read());
		
		}
		
		/*
		*	Function permettant d'ajouter un type de travail
		* 	!! Seulement disponible pour les administrateurs
		*/
		function admin_ajouter() {

			if ($this->request->is('post')) {
        	//If the form data can be validated and saved...
        		if ($this->WorkType->save($this->request->data)) {
            	//Set a session flash message and redirect.
            		$this->Session->setFlash("Votre ouvrier a bien été créé");
        		}
    		}
		
		}
		
		/*
		*	Function permettant de supprimer un type de travail
		*	!! Seulement disponible pour les administrateurs
		*	@param : $id de l'élément à supprimer
		*/
		function admin_supprimer($id) {
		
			$this->WorkType->delete($id);
			$this->flash('L\'ouvrier a ?t? supprim?', '/workType');
		
		}
		
		/*
		*	Function permettant de modifier un type de travail
		*	!! Seulement disponible pour les administrateurs
		*	@param : $id de l'élément à supprimer
		*/
		function admin_editer($id = null) {
		
			if(empty($this->data)){
				$this->WorkType->id = $id;
				$this->data = $this->WorkType->read();
			} else {
				if ($this->request->is('post')) {
        		//If the form data can be validated and saved...
        			if ($this->WorkType->save($this->request->data['Worktype'])) {
            		//Set a session flash message and redirect.
            			$this->Session->setFlash("Votre ouvrier a bien été modifié");
        			}
    			}
			}
			
		
		}

		
	}

?>