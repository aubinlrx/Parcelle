
<?php 
	Class EquipmentController extends AppController {
	
		var $name = "Equipment";
		
		//var $scaffold;
		
		/*
		*	Function gérant l'affichage de tous les équipements
		*/
		function index() {
		
			$this->set('equipments', $this->Equipment->find('all'));
		
		}
		
		/*
		*	Function permettant d'afficher un élément
		*	@param : $id de l'élement.
		*/
		function afficher($id = null) {
		
			$this->Equipment->id = $id;
			$this->set('equipment', $this->Equipment->read());
		
		}
		
		/*
		*	Function gérant l'ajout d'un nouvel équipement.
		*	!! Seulement disponible pour les administrateurs.
		*/
		function admin_ajouter() {
		
			$this->set('equipmentTypes', $this->Equipment->EquipmentType->find('list', array('fields' => array('id', 'label'), 'order' => 'EquipmentType.label ASC')));
		
			if(!empty($this->request->data)) {
				if($this->Equipment->saveAll($this->request->data)){
					$this->flash('Votre ouvrier a bien ŽtŽ crŽŽ', '/equipment');
				}
				
			}
		
		}
		
		/*
		*	Function permettant de gérer la suppression d'un équipement.
		*	!! Seulement disponible pour les administrateurs.
		*	@param : $id de l'élément à supprimer.
		*/
		function admin_supprimer($id) {
		
			$this->Equipment->delete($id);
			$this->flash('L\'ouvrier a ŽtŽ supprimŽ', '/equipment');
		
		}
		
		/*
		*	Function gérant l'édition d'un élément
		*	!! Seulement disponible pour les administrateurs
		*	@param ! $id de l'élément à modifier.
		*/
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