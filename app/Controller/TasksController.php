<?php 
	Class TasksController extends AppController {
	
		var $name = 'Tasks';
		
		//var $scaffold;
		
		function index() {
		
			$this->set('tasks', $this->Task->find('all'));
		
		}
		
		function afficher($id = null) {
		
			$this->Task->id = $id;
			$this->set('Task', $this->Task->read());
		
		}
		
		function admin_ajouter() {
		
			$this->set('works', $this->Task->Work->find('list', array('fields' => array('id', 'label'), 'order' => 'Work.label ASC')));
			
			$this->set('plots', $this->Task->Plot->find('list', array('fields' => array('id', 'label'), 'order' => 'Plot.label ASC')));
			
			$this->set('workers', $this->Task->Worker->find('list', array('fields' => array('id', 'nom'), 'order' => 'Worker.nom ASC')));
			
			$this->set('equipment', $this->Task->Equipment->find('list', array('fields' => array('id', 'label'), 'order' => 'Equipment.label ASC')));
		
			if(!empty($this->request->data)) {
				if($this->Task->saveAll($this->request->data)){
					$this->flash('Votre ouvrier a bien ŽtŽ crŽŽ', '/tasks');
				}
				
			}
		
		}
		
		function admin_supprimer($id) {
		
			$this->Task->delete($id);
			$this->flash('L\'ouvrier a ŽtŽ supprimŽ', '/tasks');
		
		}
		
		function admin_editer($id = null) {
		
			$this->set('works', $this->Task->Work->find('list', array('fields' => array('id', 'label'), 'order' => 'Work.label ASC')));
			
			$this->set('plots', $this->Task->Plot->find('list', array('fields' => array('id', 'label'), 'order' => 'Plot.label ASC')));
			
			$this->set('workers', $this->Task->Worker->find('list', array('fields' => array('id', 'nom'), 'order' => 'Worker.nom ASC')));
			
			$this->set('equipment', $this->Task->Equipment->find('list', array('fields' => array('id', 'label'), 'order' => 'Equipment.label ASC')));
		
			if(empty($this->request->data)){
				$this->Task->id = $id;
				$this->request->data = $this->Task->read();
			} else {
				if($this->Task->saveAll($this->request->data)){
					$this->flash('la modification a eu lieu avec succŽs', '/tasks');
				}
			}
		}
		
	}

?>