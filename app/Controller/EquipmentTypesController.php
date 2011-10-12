<?php
	class EquipmentTypesController extends AppController {

		var $name = 'EquipmentTypes';
	
		//var $scaffold;
	
		function index() {
		
				$this->set('equipmentTypes', $this->EquipmentType->find('all'));
		
		}
		
		function afficher($id = null) {
		
			$this->EquipmentType->id = $id;
			$this->set('equipmentType', $this->EquipmentType->read());
		
		}
		
		function admin_ajouter() {
		
			if(!empty($this->request->data)) {
				if($this->EquipmentType->save($this->request->data)){
					$this->flash('Votre ouvrier a bien �t� cr��', '/EquipmentType');
				}
					
			}
		
		}
		
		function admin_supprimer($id) {
		
			$this->EquipmentType->delete($id);
			$this->flash('L\'ouvrier a �t� supprim�', '/EquipmentType');
		
		}
		
		function admin_editer($id = null) {
		
			if(empty($this->request->data)){
				$this->EquipmentType->id = $id;
				$this->request->data = $this->EquipmentType->read();
			} else {
				if($this->EquipmentType->save($this->request->data['EquipmentType'])){
					$this->flash('la modification a eu lieu avec succ�s', '/EquipmentType');
				}
			}
			
		}
	
	}
?>