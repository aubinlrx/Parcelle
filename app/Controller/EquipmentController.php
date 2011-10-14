
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
		
			if ($this->request->is('post')) {
        	//If the form data can be validated and saved...
        		if ($this->Equipment->saveAll($this->request->data)) {
            	//Set a session flash message and redirect.
            		$this->Session->setFlash("Votre équipement a bien été créé");
        		}
    		}

			$this->set('equipmentTypes', $this->Equipment->EquipmentType->find('list', array('fields' => array('id', 'label'), 'order' => 'EquipmentType.label ASC')));
		
		}
		
		/*
		*	Function permettant de gérer la suppression d'un équipement.
		*	!! Seulement disponible pour les administrateurs.
		*	@param : $id de l'élément à supprimer.
		*/
		function admin_supprimer($id) {
		
			$this->Equipment->delete($id);
			$this->Session->setFlash('L\'équipement a été supprimé');
		
		}
		
		/*
		*	Function g?rant l'?dition d'un ?l?ment
		*	!! Seulement disponible pour les administrateurs
		*	@param ! $id de l'?l?ment ? modifier.
		*/
		function admin_editer($id = null) {
		
			$this->set('equipmentTypes', $this->Equipment->EquipmentType->find('list', array('fields' => array('id', 'label'), 'order' => 'EquipmentType.label ASC')));
		
			if(empty($this->request->data)){
				$this->Equipment->id = $id;
				$this->request->data = $this->Equipment->read();
			} else {
				if ($this->request->is('post')) {
	        	//If the form data can be validated and saved...
	        		if ($this->Equipment->saveAll($this->request->data['Equipment'])) {
	            	//Set a session flash message and redirect.
	            		$this->Session->setFlash("Votre équipement a bien été modifié");
	        		}
	    		}
			}
		}
		
	}

?>