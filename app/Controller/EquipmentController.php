<?php 
	Class EquipmentController extends AppController {
	
		var $name = "Equipment";
		
		//var $scaffold;
		
		function index() {
		
			$this->set('equipments', $this->Equipment->find('all'));
		
		}
		
		function afficher($id = null) {
		
			$this->Equipment->id = $id;
			$this->set('equipment', $this->Equipment->read());
		
		}
		
		function admin_ajouter() {
		
			$this->set('equipmentTypes', $this->Equipment->EquipmentType->find('list', array('fields' => array('id', 'label'), 'order' => 'EquipmentType.label ASC')));
		
			if(!empty($this->request->data)) {
				if($this->Equipment->saveAll($this->request->data)){
					$this->flash('Votre ouvrier a bien ŽtŽ crŽŽ', '/equipment');
				}
				
			}
		
		}
		
		function admin_supprimer($id) {
		
			$this->Equipment->delete($id);
			$this->flash('L\'ouvrier a ŽtŽ supprimŽ', '/equipment');
		
		}
		
		function admin_editer($id = null) {
		
			$this->set('equipmentTypes', $this->Equipment->EquipmentType->find('list', array('fields' => array('id', 'label'), 'order' => 'EquipmentType.label ASC')));
		
			if(empty($this->request->data)){
				$this->Equipment->id = $id;
				$this->request->data = $this->Equipment->read();
			} else {
				if($this->Equipment->save($this->request->data['Equipment'])){
					$this->flash('la modification a eu lieu avec succŽs', '/equipment');
				}
			}
		}
		
	}

?>