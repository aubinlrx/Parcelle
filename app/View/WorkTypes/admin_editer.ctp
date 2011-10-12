<h1>Editer le type de travail</h1>
<?php    
	echo $form->create('WorkType', array('action' => 'editer'));
    echo $form->hidden('id');
    echo $form->input('label');        
    echo $form->end('Modifier');
?>