<h1>Editer le Post</h1>
<?php    
	echo $form->create('Worker', array('action' => 'editer'));
    echo $form->hidden('id');
    echo $form->input('nom');    
    echo $form->input('prenom');    
    echo $form->end('Modifier');
?>