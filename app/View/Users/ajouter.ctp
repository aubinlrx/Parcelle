<h1>Ajouter Un utilisateur</h1>

<?php 
	echo $this->Form->create('User');
	echo $this->Form->input('login');
	echo $this->Form->Password('password');
	echo $this->Form->input('User.group_id');
	echo $this->Form->end('Sauvegarder');

?>