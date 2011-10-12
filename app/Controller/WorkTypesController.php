<?php 
	Class WorkTypesController extends AppController {
	
		var $name = "WorkTypes";
		
		//var $scaffold;
		
		function index() {
		
			$this->set('workTypes', $this->WorkType->find('all'));
		
		}
		
		function afficher($id = null) {
		
			$this->WorkType->id = $id;
			$this->set('workType', $this->WorkType->read());
		
		}
		
		function admin_ajouter() {
		
			if(!empty($this->data)) {
				if($this->WorkType->save($this->data)){
					$this->flash('Votre ouvrier a bien ŽtŽ crŽŽ', '/workType');
				}
				
			}
		
		}
		
		function admin_supprimer($id) {
		
			$this->WorkType->delete($id);
			$this->flash('L\'ouvrier a ŽtŽ supprimŽ', '/workType');
		
		}
		
		function admin_editer($id = null) {
		
			if(empty($this->data)){
				$this->WorkType->id = $id;
				$this->data = $this->WorkType->read();
			} else {
				if($this->WorkType->save($this->data['WorkType'])){
					$this->flash('la modification a eu lieu avec succŽs', '/workType');
				}
			}
			
		
		}

		
	}

?>