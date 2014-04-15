<?php
App::uses('Controller', 'Controller');
App::uses('IcingUtil', 'Icing.Lib');
class AppController extends Controller {
	
	public $helpers = array(
		'Session',
		'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
		'TwitterHtml' => array('className' => 'BoostCake.BoostCakeHtml'),
		'Form' => array('className' => 'BoostCake.BoostCakeForm'),
		'TwitterForm' => array('className' => 'BoostCake.BoostCakeForm'),
		'Paginator' => array('className' => 'BoostCake.BoostCakePaginator'),
		'TwitterPaginator' => array('className' => 'BoostCake.BoostCakePaginator'),
		'Icing.FileUpload',
	);
	
	public $components = array(
		'Session',
		'RequestHandler',
		'DebugKit.Toolbar',
	);
	
	public $uses = array('Character', 'Configuration.Configuration');
	
	public function beforeFilter() {
		$this->set('nav_chars', $this->Character->find('list'));
		$this->Configuration->load('DAF');
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
