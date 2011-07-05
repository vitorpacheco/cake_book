<?php
echo $this->Form->create();
echo $this->Form->inputs(array(
	'legend' => 'Signup',
	'email',
	'username',
	'password',
));
echo $this->Form->end('Signup');