<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session','Cookie');
	
	public function beforeFilter() {
		$this->Auth->allow('register');
		parent::beforeFilter();
	}
	
	public function login() {
		$this->loginLogic();
  }
  
  public function admin_login(){
  	$this->setAction('login');
  }
  
  public function logout() {
    $this->infoFlash('You\'ve been sucessfully logged out.');
    @$this->Cookie->delete('Auth.User');
    $this->redirect($this->Auth->logout());
  }
  
  public function register(){
  	if ($this->Auth->user()) {
  		$this->redirect('/');
  	}
  	if (!empty($this->request->data)) {
  		if ($this->User->register($this->request->data)) {
  			$this->goodFlash('Succesful registration please login now');
  			$this->redirect(array('action' => 'login'));
  		} else {
  			$this->badFlash('Errors, please fix below');
  		}
  	}
  }

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
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
			if ($this->User->save($this->request->data)) {
				$this->goodFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->badFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		
		if ($id && empty($this->request->data)) {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->goodFlash(__('The user has been deleted.'));
		} else {
			$this->badFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function admin_change_password($id = null) {
		if (!$id) {
			$this->badFlash('no user id given.');
			return $this->redirect(array('action' => 'index'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->register($this->request->data)) {
				$this->goodFlash(__('Password Has Been Updated.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->badFlash(__('The user could not be saved. Please, try again.'));
			}
		} elseif($id) {
			$this->request->data = $this->User->read(null, $id);
		}
	}
	
	private function loginLogic($do_redirect = true, $cookie_length = '+4 weeks'){
		//-- code inside this function will execute only when autoRedirect was set to false (i.e. in a beforeFilter).
		if ($this->request->is('post')) {
			if (!$this->Auth->login()) {
				$this->badFlash('Username or password is incorrect');
			}
    }
		
		if ($this->Auth->user()) {
			if (!empty($this->request->data)) { 
				$cookie = array();
        $cookie['email'] = $this->request->data['User']['email'];
        $cookie['password'] = Security::hash($this->request->data['User']['password'], null, true);
        $this->Cookie->write('Auth.User', $cookie, false, $cookie_length);
			}
			if ($do_redirect) {
				$this->redirect($this->Auth->redirect());
			}
		}
		if (empty($this->request->data)) {
			$cookie = $this->Cookie->read('Auth.User');
			if ($cookie && $user = $this->User->findByEmailAndPassword($cookie['email'], $cookie['password'])) {
				if ($this->Auth->login($user['User'])) {
					//  Clear auth message, just in case we use it.
					$this->Session->delete('Message.auth');
					if ($do_redirect) {
						$this->redirect($this->Auth->redirect());
					}
				}
			}
		}
	}
	
}
