<?php
class UsersController extends AppController {
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('add');
	}

	public function dashboard() {

	}

	public function login() {
		if (!empty($this->data) && !empty($this->Auth->data['User']['username'])
				&& !empty($this->Auth->data['User']['password'])) {
			$user = $this->User->find('first', array(
				'conditions' => array(
					'User.email' => $this->Auth->data['User']['username'],
					'User.password' => $this->Auth->data['User']['password'],
				),
				'recursive' => -1,
			));

			if (!empty($user) && $this->Auth->login($user)) {
				if ($this->Auth->autoRedirect) {
					$this->redirect($this->Auth->redirect());
				}
			} else {
				$this->Session->setFlash(
					$this->Auth->loginError,
					$this->Auth->flashElement,
					array(),
					'auth'
				);
			}
		}
	}

	public function logout() {
		$this->redirect($this->Auth->logout());
	}

	public function add() {
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash('User created!');
				$this->redirect(array('action' => 'login'));
			} else {
				$this->Session->setFlash('Please correct the errors');
			}
		}
	}
}