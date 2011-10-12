<?php 
	Class WorkersController extends AppController {
	
		var $name = "Workers";
		
		//var $scaffold;
		
		function index() {
		
			$this->set('workers', $this->Worker->find('all'));
		
		}
		
		function afficher($id = null) {
		
			$this->Worker->id = $id;
			$this->set('worker', $this->Worker->read());
		
		}
		
		function admin_ajouter() {
		
			if(!empty($this->request->data)) {
				if($this->Worker->save($this->request->data)){
					$this->flash('Votre ouvrier a bien ŽtŽ crŽŽ', '/worker');
				}
				
			}
		
		}
		
		function admin_supprimer($id) {
		
			$this->Worker->delete($id);
			$this->flash('L\'ouvrier a été supprimŽ', '/worker');
		
		}
		
		function admin_editer($id = null) {
		
			if(empty($this->request->data)){
				$this->Worker->id = $id;
				$this->request->data = $this->Worker->read();
			} else {
				if($this->Worker->save($this->request->data['Worker'])){
					$this->flash('la modification a eu lieu avec succŽs', '/worker');
				}
			}
			
		
		}
		
	}

?>