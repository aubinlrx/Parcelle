<?php 

	Class Task extends AppModel {
		
		var $name = "Task";
		
		var $hasAndBelongsToMany = array('Worker', 'Plot', 'Work', 'Equipment');
		
	}
	
?>