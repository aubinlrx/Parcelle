<?php 

	Class Work extends AppModel {
		
		var $name = "Work";
		
		var $belongsTo = "WorkType";
		
		var $hasAndBelongsToMany = "Task";
		
	}
	
?>