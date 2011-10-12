<h1>Ajouter Ouvrier</h1>
<?php 
echo $form->create('Worker');
echo $form->input('nom');
echo $form->input('prenom');
echo $form->end('Sauvegarder');
?>