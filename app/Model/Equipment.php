<?php 

	Class Equipment extends AppModel {
		
		var $name = "Equipment";
		
		var $belongsTo = "EquipmentType";
		
		var $hasAndBelongsToMany = "Task";
		
	}
	
?>