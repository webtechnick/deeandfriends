<?php
App::uses('AppController', 'Controller');
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Character');

	public function beforeFilter() {
		$this->Auth->allow('home', 'contact');
		parent::beforeFilter();
	}
	
	public function home() {
		$this->set('title_for_layout', 'Home');
	}
	
	public function contact() {
		if ($this->request->is('post')) {
			$result = $this->Character->email(
				Configure::read('DAF.email'), //to
				$this->request->data['Contact']['from'], //from
				'contact_me', //template
				'Website Submission', //subject
				array(
					'data' => $this->request->data['Contact']
				) //veiw vars
			);
			if ($result) {
				$this->goodFlash('Thank you, me or one of my friends will respond to you shortly!');
			} else {
				$this->badFlash('Enable to Send Email');
			}
		}
		$this->set('characters', $this->Character->findList());
	}
}
