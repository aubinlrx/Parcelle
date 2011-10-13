
<?php 
	Class EquipmentController extends AppController {
	
		var $name = "Equipment";
		
		//var $scaffold;
		
		/*
		*	Function g�rant l'affichage de tous les �quipements
		*/
		function index() {
		
			$this->set('equipments', $this->Equipment->find('all'));
		
		}
		
		/*
		*	Function permettant d'afficher un �l�ment
		*	@param : $id de l'�lement.
		*/
		function afficher($id = null) {
		
			$this->Equipment->id = $id;
			$this->set('equipment', $this->Equipment->read());
		
		}
		
		/*
		*	Function g�rant l'ajout d'un nouvel �quipement.
		*	!! Seulement disponible pour les administrateurs.
		*/
		function admin_ajouter() {
		
			$this->set('equipmentTypes', $this->Equipment->EquipmentType->find('list', array('fields' => array('id', 'label'), 'order' => 'EquipmentType.label ASC')));
		
			if(!empty($this->request->data)) {
				if($this->Equipment->saveAll($this->request->data)){
					$this->flash('Votre ouvrier a bien �t� cr��', '/equipment');
				}
				
			}
		
		}
		
		/*
		*	Function permettant de g�rer la suppression d'un �quipement.
		*	!! Seulement disponible pour les administrateurs.
		*	@param : $id de l'�l�ment � supprimer.
		*/
		function admin_supprimer($id) {
		
			$this->Equipment->delete($id);
			$this->flash('L\'ouvrier a �t� supprim�', '/equipment');
		
		}
		
		/*
		*	Function g�rant l'�dition d'un �l�ment
		*	!! Seulement disponible pour les administrateurs
		*	@param ! $id de l'�l�ment � modifier.
		*/
		function admin_editer($id = null) {
		
			$this->set('equipmentTypes', $this->Equipment->EquipmentType->find('list', array('fields' => array('id', 'label'), 'order' => 'EquipmentType.label ASC')));
		
			if(empty($this->request->data)){
				$this->Equipment->id = $id;
				$this->request->data = $this->Equipment->read();
			} else {
				if($this->Equipment->save($this->request->data['Equipment'])){
					$this->flash('la modification a eu lieu avec succ�s', '/equipment');
				}
			}
		}
		
	}

?>