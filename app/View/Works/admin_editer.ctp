<h1>Ajouter Travaille</h1>
<?php 
echo $form->create('Work', array('action' => 'editer'));
echo $form->input('Work.id');
echo $form->input('Work.label');
echo $form->input('Work.work_type_id');
echo $form->end('Modifier');
?>