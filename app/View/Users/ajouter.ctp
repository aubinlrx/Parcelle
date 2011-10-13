
<h1>Ajouter Un utilisateur</h1>

<?php 
	echo $this->Form->create('User', array('action' => 'ajouter'));
	echo $this->Form->input('login', array(
		'label'	=> 'Nom d\'utilisateur',
		'error'	=> array(
			//gestion de l'affichage du message en cas de login vide.
			'regle-login' 	=> __("Le login ne peut être vide", true),
			'minLength'		=> __("Le login doit faire au moins 4 caractères", true),
			'isUnique' 		=> __("L'utilisateur existe déjà", true)
			)
		));
	echo $this->Form->input('email',array(
			'type'	=>	'email',
			'label'	=>	"Email",
			'error'	=> 	array(
				'notEmpty'	=> __("Vous devez spéficier un adresse mail", true),
				'email'		=> __("Ce n'est pas une adresse email valide", true),
				'isUnique'	=> __("Un compte comprennant la même adresse mail existe déjà", true)
			)
		));
	echo $this->Form->input('password', array(
			'label' =>	'Mot de passe',
			'error'	=> array(
				//affichage des messages d'erreur
				'notEmpty' 	=> __('Vous devez spécifier un mot de passe', true),
				'minLength' => 	__('Le mot de passe doit faire au moins 8 caractères', true)
			)
		));
	echo $this->Form->input('password_confirm', array(
			'type'	=> 	'password',
			'label'	=>	'Confirmation du mot de passe',
			'error'	=>	array(
				//affichage du message d'erreur en cas de mauvais mot de passe
				'comparePassword'	=>	__('Vous devez spécifier le même mot de passe')
			)
		));
	echo $this->Form->input('User.group_id', array(
			'label'	=> 'Ajouter l\'utilisateur à un groupe'
		));
	echo $this->Form->end('Sauvegarder');

?>