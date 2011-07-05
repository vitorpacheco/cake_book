<?php
class AppController extends Controller {
	public $components = array(
		'Auth' => array(
			'authorize' => 'controller',
		),
		'Session',
	);

	public function isAuthorized() {
		return true;
	}
}