<?php
	class EquipmentTypesController extends AppController {

		var $name = 'EquipmentTypes';
	
		//var $scaffold;
	
		/*
		*	Function permettant l'affichage de tous les types d'équipement.
		*/
		function index() {
		
				$this->set('equipmentTypes', $this->EquipmentType->find('all'));
		
		}
		
		/*
		*	Function permettant d'afficher un seul type d'équipement.
		*/
		function afficher($id = null) {
		
			$this->EquipmentType->id = $id;
			$this->set('equipmentType', $this->EquipmentType->read());
		
		}
		
		/*
		*	Function permettant d'ajouter un nouveau type d'?quipement.
		*	!! Seulement disponible pour les administrateurs
		*/
		function admin_ajouter() {
		
			if ($this->request->is('post')) {
        	//If the form data can be validated and saved...
        		if ($this->EquipmentType->save($this->request->data)) {
            	//Set a session flash message and redirect.
            		$this->Session->setFlash("Votre type d'équipement a bien été créé");
        		}
    		}
		}
		
		/*
		*	Function permettant de supprimer un type d'équipement.
		*	!! Seulement disponible pour les administrateurs
		*	@param : $id du type d'équipement à supprimer.
		*/
		function admin_supprimer($id) {
		
			$this->EquipmentType->delete($id);
			$this->Session->setFlash('Le type d\'équipement a été supprimé');
		
		}
		
		/*
		*	Function permettant d'éditer un type d'équipement.
		*	!! Seulement disponible pour les administrateurs
		*	@param : $id du type d'équipement à éditer.
		*/
		function admin_editer($id = null) {
		
			if(empty($this->request->data)){
				$this->EquipmentType->id = $id;
				$this->request->data = $this->EquipmentType->read();
			} else {
				if ($this->request->is('post')) {
	        	//If the form data can be validated and saved...
	        		if ($this->EquipmentType->save($this->request->data['EquipmentType'])) {
	            	//Set a session flash message and redirect.
	            		$this->Session->setFlash("Votre type d'équipement a bien été modifié");
	        		}
	    		}
			}
			
		}
	
	}
?>