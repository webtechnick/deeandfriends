<?php
App::uses('Controller', 'Controller');
class AppController extends Controller {
	
	public $helpers = array(
		'Session',
		'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
		'Form' => array('className' => 'BoostCake.BoostCakeForm'),
		'Paginator' => array('className' => 'BoostCake.BoostCakePaginator'),
	);
	
	public $components = array(
		'Session',
		'RequestHandler',
		'DebugKit.Toolbar',
	);
	
	public $uses = array('Character');
	
	public function beforeFilter() {
		$this->set('nav_chars', $this->Character->find('list'));
		return parent::beforeFilter();
	}
	
	public function goodFlash($message) {
		$this->__setFlash($message, 'alert-success');
	}
	
	public function infoFlash($message) {
		$this->__setFlash($message, 'alert-info');
	}
	
	public function badFlash($message) {
		$this->__setFlash($message, 'alert-danger');
	}
	
	public function warnFlash($message) {
		$this->__setFlash($message, 'alert-warning');
	}
	
	private function __setFlash($message, $class = '') {
		$this->Session->setFlash($message, 'alert', array('plugin' => 'BoostCake','class' => $class));
	}
}
