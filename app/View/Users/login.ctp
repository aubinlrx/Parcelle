<h2>Accs Admin</h2>
 
<?php
echo $this->Session->flash('auth');
echo $this->Session->flash();

echo $this->Form->create('User', array('action' => 'login'));
echo $this->Form->inputs(array(
    'legend' => __('Login', true),
    'login',
    'password'
));
echo $this->Form->end('Login');

?>