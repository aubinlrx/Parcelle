<?php 
	Class TasksController extends AppController {
	
		var $name = 'Tasks';
		
		//var $scaffold;
		
		/*
		*	Function d'affichage de toutes les tâches
		*/
		function index() {
		
			$this->set('tasks', $this->Task->find('all'));
		
		}
		
		/*
		*	Function d'affichage d'une tâche en particulier
		*/
		function afficher($id = null) {
		
			$this->Task->id = $id;
			$this->set('Task', $this->Task->read());
		
		}
		
		/*
		*	Function gérant l'ajout d'une nouvelle tâche
		*	!! Seulement disponible pour les administrateurs
		*/
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
		
		/*
		*	Function gérant la suppression d'une tâche
		*	!! Seulement disponible pour les administrateurs
		*	@param : $id de la tâche à supprimer
		*/
		function admin_supprimer($id) {
		
			$this->Task->delete($id);
			$this->flash('L\'ouvrier a ŽtŽ supprimŽ', '/tasks');
		
		}
		
		/*
		*	Function gérant l'édition d'une tâche
		*	!! Seulement disponible pour les administrateurs
		*	@param : $id de la tâche à éditer.
		*/
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