<?php
App::uses('AppController', 'Controller');
/**
 * Characters Controller
 *
 * @property Character $Character
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CharactersController extends AppController {
	public $components = array('Paginator', 'Session');
	public $paginate = array(
		'limit' => 10,
		'order' => array(
			'Character.name' => 'ASC'
		),
		'contain' => array('Headshot')
	);
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Paginator->settings = $this->paginate;
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Character->recursive = 0;
		$this->set('characters', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Character->exists($id)) {
			throw new NotFoundException(__('Invalid character'));
		}
		$options = array('conditions' => array('Character.' . $this->Character->primaryKey => $id));
		$this->set('character', $this->Character->find('first', $options));
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
			if ($this->Character->saveAll($this->request->data)) {
				$this->goodFlash('Character Saved');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->badFlash('Unable to save character.');
			}
		}
		
		if ($id && empty($this->request->data)) {
			$options = array('conditions' => array('Character.' . $this->Character->primaryKey => $id));
			$this->request->data = $this->Character->find('first', $options);
			$this->set('id', $id);
		}
		
		$services = $this->Character->Service->find('list');
		$this->set(compact('services'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Character->id = $id;
		if (!$this->Character->exists()) {
			throw new NotFoundException(__('Invalid character'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Character->delete()) {
			$this->Session->setFlash(__('The character has been deleted.'));
		} else {
			$this->Session->setFlash(__('The character could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
