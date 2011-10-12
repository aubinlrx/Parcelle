<?php 
	Class PlotsController extends AppController {
	
		var $name = 'Plots';
		
		var $scaffold;
		
		function index() {
		
			$this->set('plots', $this->Plot->find('all'));
		
		}
		
		function afficher($id = null) {
		
			$this->Plot->id = $id;
			$this->set('plot', $this->Plot->read());
		
		}
		
		function admin_ajouter() {
		
			if(!empty($this->request->data)) {
				if($this->Plot->saveAll($this->request->data)){
					$this->flash('Votre ouvrier a bien ŽtŽ crŽŽ', '/plot');
				}
				
			}
		
		}
		
		function admin_supprimer($id) {
		
			$this->Plot->delete($id);
			$this->flash('L\'ouvrier a ŽtŽ supprimŽ', '/plot');
		
		}
		
		function admin_editer($id = null) {
		
			if(empty($this->request->data)){
				$this->Plot->id = $id;
				$this->request->data = $this->Plot->read();
			} else {
				if($this->Plot->saveAll($this->request->data)){
					$this->flash('la modification a eu lieu avec succŽs', '/plot');
				}
			}
		}

		
	}

?>