<?php 
	Class PlotInformationsController extends AppController {
	
		var $name = "PlotInformations";
		
		//var $scaffold;
		
		
		function index() {
		
			$this->set('plotInformations', $this->PlotInformation->find('all'));
		
		}
		
		function afficher($id = null) {
		
			$this->PlotInformation->id = $id;
			$this->set('plotInformation', $this->PlotInformation->read());
		
		}
		
		function admin_ajouter() {
		
			if(!empty($this->request->data)) {
				if($this->PlotInformation->save($this->request->data)){
					$this->flash('Votre ouvrier a bien �t� cr��', '/PlotInformation');
				}
				
			}
		
		}
		
		function admin_supprimer($id) {
		
			$this->PlotInformation->delete($id);
			$this->flash('L\'ouvrier a �t� supprim�', '/PlotInformation');
		
		}
		
		function admin_editer($id = null) {
		
			if(empty($this->request->data)){
				$this->PlotInformation->id = $id;
				$this->request->data = $this->PlotInformation->read();
			} else {
				if($this->PlotInformation->save($this->request->data['PlotInformation'])){
					$this->flash('la modification a eu lieu avec succ�s', '/PlotInformation');
				}
			}
			
		
		}
		
	}

?>