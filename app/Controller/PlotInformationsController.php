<?php 
	Class PlotInformationsController extends AppController {
	
		var $name = "PlotInformations";
		
		//var $scaffold;
		
		/*
		*	Function permettant l'affichage de toutes les informations de parcelle
		*/
		function index() {
		
			$this->set('plotInformations', $this->PlotInformation->find('all'));
		
		}
		
		/*
		*	Function permettant l'affichage des informations de la parcelle.
		*/
		function afficher($id = null) {
		
			$this->PlotInformation->id = $id;
			$this->set('plotInformation', $this->PlotInformation->read());
		
		}
		
		/*
		*	Function permettant d'ajouter de nouvelle information de parcelle.
		*	!! Seulement disponible pour les administrateurs
		*/
		function admin_ajouter() {
			
			if ($this->request->is('post')) {
        	//If the form data can be validated and saved...
        		if ($this->PlotInformation->save($this->request->data)) {
            	//Set a session flash message and redirect.
            		$this->Session->setFlash("Votre ouvrier a bien été créé");
        		}
    		}
		
		}
		
		/*
		*	Function permettant de supprimer une information de parcelle	
		*	!! Seulement disponible pour les administrateurs
		*	@param : $id de l'information 
		*/
		function admin_supprimer($id) {
		
			$this->PlotInformation->delete($id);
			$this->flash('L\'ouvrier a été supprimé', '/PlotInformation');
		
		}
		
		/*
		*	Function permettant d'éditer une information de parcelle	
		*	!! Seulement disponible pour les administrateurs
		*	@param : $id de l'information 
		*/
		function admin_editer($id = null) {
		
			if(empty($this->request->data)){
				$this->PlotInformation->id = $id;
				$this->request->data = $this->PlotInformation->read();
			} else {
				if ($this->request->is('post')) {
	        	//If the form data can be validated and saved...
	        		if ($this->PlotInformation->save($this->request->data['PlotInformation'])) {
	            	//Set a session flash message and redirect.
	            		$this->Session->setFlash("Votre ouvrier a bien été modifié");
	        		}
	    		}
			}
			
		
		}
		
	}

?>