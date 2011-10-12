<?php 
	Class WorksController extends AppController {
	
		var $name = "Works";
		
		//var $scaffold;
		
		function index() {
		
			$this->set('works', $this->Work->find('all'));
		
		}
		
		function afficher($id = null) {
		
			$this->Work->id = $id;
			$this->set('work', $this->Work->read());
		
		}
		
		function admin_ajouter() {
		
			$this->set('workTypes', $this->Work->WorkType->find('list', array('fields' => array('id', 'label'), 'order' => 'WorkType.label ASC')));
		
			if(!empty($this->data)) {
				if($this->Work->saveAll($this->data)){
					$this->flash('Votre ouvrier a bien été créé', '/work');
				}
				
			}
		
		}
		
		function admin_supprimer($id) {
		
			$this->Work->delete($id);
			$this->flash('L\'ouvrier a été supprimé', '/work');
		
		}
		
		function admin_editer($id = null) {
		
			$this->set('workTypes', $this->Work->WorkType->find('list', array('fields' => array('id', 'label'), 'order' => 'WorkType.label ASC')));
		
			if(empty($this->data)){
				$this->Work->id = $id;
				$this->data = $this->Work->read();
			} else {
				if($this->Work->saveAll($this->data['Work'])){
					$this->flash('la modification a eu lieu avec succés', '/work');
				}
			}
		}
		
	}

?>