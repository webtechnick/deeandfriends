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

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

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
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Character->create();
			if ($this->Character->save($this->request->data)) {
				$this->Session->setFlash(__('The character has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The character could not be saved. Please, try again.'));
			}
		}
		$headshots = $this->Character->Headshot->find('list');
		$services = $this->Character->Service->find('list');
		$this->set(compact('headshots', 'services'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Character->exists($id)) {
			throw new NotFoundException(__('Invalid character'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Character->save($this->request->data)) {
				$this->Session->setFlash(__('The character has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The character could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Character.' . $this->Character->primaryKey => $id));
			$this->request->data = $this->Character->find('first', $options);
		}
		$headshots = $this->Character->Headshot->find('list');
		$services = $this->Character->Service->find('list');
		$this->set(compact('headshots', 'services'));
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
