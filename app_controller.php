<?php
class AppController extends Controller {
	public $components = array(
		'Auth' => array(
			'authorize' => 'controller',
		),
		'Session',
	);

	public function beforeFilter() {
		$user = $this->Auth->user();
		if (!empty($user)) {
			Configure::write('User', $user[$this->Auth->getModel()->alias]);
		}
	}

	public function beforeRender() {
		$user = $this->Auth->user();
		if (!empty($user)) {
			$user = $user[$this->Auth->getModel()->alias];
		}
		$this->set(compact('user'));
	}

	public function isAuthorized() {
		return true;
	}
}
