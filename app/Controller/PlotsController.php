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
		
			if(!empty($this->request->data)) {
				if($this->Plot->saveAll($this->request->data)){
					$this->flash('Votre ouvrier a bien été créé', '/plot');
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
			$this->flash('L\'ouvrier a été supprimé', '/plot');
		
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
				if($this->Plot->saveAll($this->request->data)){
					$this->flash('la modification a eu lieu avec succés', '/plot');
				}
			}
		}

		
	}

?>