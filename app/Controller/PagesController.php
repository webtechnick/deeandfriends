<?php
App::uses('AppController', 'Controller');
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

	public function beforeFilter() {
		$this->Auth->allow('home');
		parent::beforeFilter();
	}
	
	public function home() {
		$this->set('title_for_layout', 'Home');
	}
}
