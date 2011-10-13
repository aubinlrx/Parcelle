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
		*	Function permettant d'ajouter un nouveau type d'équipement.
		*	!! Seulement disponible pour les administrateurs
		*/
		function admin_ajouter() {
		
			if(!empty($this->request->data)) {
				if($this->EquipmentType->save($this->request->data)){
					$this->flash('Votre ouvrier a bien ŽtŽ crŽŽ', '/EquipmentType');
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
			$this->flash('L\'ouvrier a ŽtŽ supprimŽ', '/EquipmentType');
		
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
				if($this->EquipmentType->save($this->request->data['EquipmentType'])){
					$this->flash('la modification a eu lieu avec succŽs', '/EquipmentType');
				}
			}
			
		}
	
	}
?>