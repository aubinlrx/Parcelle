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
		
			if(!empty($this->request->data)) {
				if($this->PlotInformation->save($this->request->data)){
					$this->flash('Votre ouvrier a bien été créé', '/PlotInformation');
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
				if($this->PlotInformation->save($this->request->data['PlotInformation'])){
					$this->flash('la modification a eu lieu avec succés', '/PlotInformation');
				}
			}
			
		
		}
		
	}

?>