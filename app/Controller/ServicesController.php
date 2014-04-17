<?php
App::uses('AppController', 'Controller');
/**
 * Services Controller
 *
 * @property Service $Service
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ServicesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
	
	public function beforeFilter() {
		$this->Auth->allow('get_services');
		parent::beforeFilter();
	}
	
	public function index() {
		$this->set('services', $this->Service->findAllForIndex());
	}
	
	public function get_services() {
		if (!empty($this->request->params['requested'])) {
			return $this->Service->findAllForIndex();
		}
		die("Do not access directly.");
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Service->recursive = 0;
		$this->set('services', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Service->exists($id)) {
			throw new NotFoundException(__('Invalid service'));
		}
		$options = array('conditions' => array('Service.' . $this->Service->primaryKey => $id));
		$this->set('service', $this->Service->find('first', $options));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Service->save($this->request->data)) {
				$this->goodFlash(__('The service has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->badFlash(__('The service could not be saved. Please, try again.'));
			}
		}
		
		if ($id && empty($this->request->data)) {
			$this->request->data = $this->Service->find('first', array(
				'conditions' => array('Service.id' => $id)
			));
			$this->set('id', $id);
		}
		$this->set('characters', $this->Service->Character->find('list'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Service->id = $id;
		if (!$this->Service->exists()) {
			throw new NotFoundException(__('Invalid service'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Service->delete()) {
			$this->Session->setFlash(__('The service has been deleted.'));
		} else {
			$this->Session->setFlash(__('The service could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
