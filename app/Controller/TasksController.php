<?php 
	Class TasksController extends AppController {
	
		var $name = 'Tasks';
		
		//var $scaffold;
		
		/*
		*	Function d'affichage de toutes les t?ches
		*/
		function index() {
		
			$this->set('tasks', $this->Task->find('all'));
		
		}
		
		/*
		*	Function d'affichage d'une t?che en particulier
		*/
		function afficher($id = null) {
		
			$this->Task->id = $id;
			$this->set('Task', $this->Task->read());
		
		}
		
		/*
		*	Function g?rant l'ajout d'une nouvelle t?che
		*	!! Seulement disponible pour les administrateurs
		*/
		function admin_ajouter() {

			$error = array(
				'0' => null,
				'1'	=> 0
			);

			if ($this->request->is('post')) {
        	//If the form data can be validated and saved...
        		
        		$error = $this->validation_formulaire($this->request->data);
    
        		
        		if($error[1] !== 1 && $this->Task->saveAll($this->request->data)){
	            	//Set a session flash message and redirect.
	            	$this->Session->setFlash("Votre tâche a bien été créé");
	            	$this->redirect('/admin');
	        	}else {
	        		
	        		$this->Session->setFlash("Vous devez au moins sélectionner un élement dans chaque champs");
	        	}
         	}
		
			$this->set('works', $this->Task->Work->find('list', array('fields' => array('id', 'label'), 'order' => 'Work.label ASC')));
			
			$this->set('plots', $this->Task->Plot->find('list', array('fields' => array('id', 'label'), 'order' => 'Plot.label ASC')));
			
			$this->set('workers', $this->Task->Worker->find('list', array('fields' => array('id', 'nom'), 'order' => 'Worker.nom ASC')));
			
			$this->set('equipment', $this->Task->Equipment->find('list', array('fields' => array('id', 'label'), 'order' => 'Equipment.label ASC')));

			$this->set('task_id', null);

			//A ajouter si l'on souhaite que les erreurs s'affiche au niveau des divs.
			//$this->set('error', $error[0]);
		
		}
		
		/*
		*	Function gérant la suppression d'une tâche
		*	!! Seulement disponible pour les administrateurs
		*	@param : $id de la t?che ? supprimer
		*/
		function admin_supprimer($id) {
		
			$this->Task->delete($id);
			$this->flash('L\'ouvrier a ?t? supprim?', '/tasks');
		
		}
		
		/*
		*	Function g?rant l'?dition d'une t?che
		*	!! Seulement disponible pour les administrateurs
		*	@param : $id de la t?che ? ?diter.
		*/
		function admin_editer($id = null) {
			
			$error = array(
				'0' => null,
				'1'	=> 0
			);
				 
			if(empty($this->request->data)){
				$this->Task->id = $id;
				$this->request->data = $this->Task->read();
			} else {
				if($this->request->is('post')) {
				//If the form data can be validated and saved...

					$error = $this->validation_formulaire($this->request->data);

					if($error[1] !== 1 && $this->Task->saveAll($this->request->data)){
						$this->Session->setFlash('la modification a eu lieu avec succés');
					}
				}
			}

			$this->set('works', $this->Task->Work->find('list', array('fields' => array('id', 'label'), 'order' => 'Work.label ASC')));
			
			$this->set('plots', $this->Task->Plot->find('list', array('fields' => array('id', 'label'), 'order' => 'Plot.label ASC')));
			
			$this->set('workers', $this->Task->Worker->find('list', array('fields' => array('id', 'nom'), 'order' => 'Worker.nom ASC')));
			
			$this->set('equipment', $this->Task->Equipment->find('list', array('fields' => array('id', 'label'), 'order' => 'Equipment.label ASC')));

			//A ajouter si l'on souhaite que les erreurs s'affiche au niveau des divs.
			//$this->set('error', $error[0]);
		
		}

		/*
		*	Function gérant la validation des champs HABTM du formulaire
		*	!! function appelée dans les méthodes d'ajout
		*	@param : $data correspond à $this->request->data
		*/
		function validation_formulaire($data){
			
			$error = array();
			$error_count = 0;
			$variable = $data;


			foreach ($variable as $key => $value) {
        		# code...
    			foreach ($value as $key2 => $value2) {
    				# code...
        			if(empty($value2)){
	        			switch($key2){
	        				case 'Equipment' :
	        					$error[$key]['html'] = '<div>';
	        					$error[$key]['error'] = "Vous devez sélectionner au moins un équipment";
	        					$error_count = 1;
	        					break;
	        				
	        				case 'Plot' :
	        					$error[$key]['html'] = '<div>';
	        					$error[$key]['error'] = "Vous devez sélectionner au moins une parcelle";
	        					$error_count = 1;
	        					break;

	        				case 'Worker' :
	        					$error[$key]['html'] = '<div>';
	        					$error[$key]['error'] = "Vous devez sélectionner au moins un ouvrier";
	        					$error_count = 1;
	        					break;

	        				case 'Work' :
	        					$error[$key]['html'] = '<div>';
	        					$error[$key]['error'] = "Vous devez sélectionner au moins un travail";
	        					$error_count = 1;
	        					break;

	        			}
	        		}
	        	}
		    }

		    return array($error, $error_count);

		}
		
	}

?>