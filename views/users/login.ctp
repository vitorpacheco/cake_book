<?php
echo $this->Form->create(array('action' => 'login'));
echo $this->Form->inputs(array(
	'legend' => 'Login',
	'username' => array('label' => 'Username / Email'),
	'password',
));
echo $this->Form->end('Login');