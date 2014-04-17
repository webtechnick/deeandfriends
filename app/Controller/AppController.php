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
		'Icing.Ckeditor'
	);
	
	public $components = array(
		'Session',
		'Auth' => array(
      'authorize' => array('Controller'),
      'loginAction' => array('controller' => 'users', 'action' => 'login'),
      'allowedActions' => array('search','view','index','get','display'),
      'logoutRedirect' => array('controller' => 'pages', 'action' => 'home'),
      'authError' => 'Please Login',
      'autoRedirect' => false,
      'authenticate' => array(
      	'Form' => array(
      		'fields' => array('username' => 'email')
      	)
      )
    ),
		'RequestHandler',
		'DebugKit.Toolbar',
	);
	
	public $uses = array('Character', 'Configuration.Configuration');
	
	public function beforeFilter() {
		$this->set('user', $this->Auth->user());
		$this->set('nav_chars', $this->Character->findForNav());
		$this->Configuration->load('DAF');
		$this->set('is_admin', $this->isAdmin());
		return parent::beforeFilter();
	}
	
	/**
	* Auth authorization function
	*/
	public function isAuthorized($user, $request = null) {
		if (strpos($this->request->action,"admin") !== false){
			return $this->isAdmin();
		}
		return true;
	}
	
	function isAdmin(){
    return ($this->Auth->user('is_admin')); 
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
