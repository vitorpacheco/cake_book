<?php
echo $this->Form->create();
echo $this->Form->inputs(array(
	'legend' => 'Signup',
	'username',
	'password',
));
echo $this->Form->end('Signup');