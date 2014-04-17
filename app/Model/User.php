<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'email';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Must be a valid email.',
			),
			'unique' => array(
				'rule' => array('isUnique'),
				'message' => 'Email already taken.'
			)
		),
		'password' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'is_admin' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	
	/**
	* Find the user by email or username
	* @param username_or_email
	* @param password
	* @return user found, or null
	*/
	function findByEmailAndPassword($email, $password){
		return $this->find('first', array(
			'conditions' => array(
				'email' => $email,
				'password' => $password
			),
			'recursive' => -1
		));
	}
	
	/**
	* To change the password you need the current password
	* @param array of data
	*/
	public function changePassword($data){
		if(isset($data['User']['current_password']) && isset($data['User']['id'])){
			if($this->checkPassword($data['User']['id'], $data['User']['current_password'])){
				unset($data['User']['current_password']);
				return $this->save($data);
			}	else {
				$this->invalidate('current_password', 'Your current password is not correct.');
			}
		}
		return false;
	}
	
	public function register($data){
		if($data['User']['password'] != $data['User']['confirm_password']){
			$this->invalidate('password', 'Password and Confirmation Password don\'t match.');
			return false;
		}
		$data['User']['password'] = $this->hashPassword($data['User']['password']);
		return $this->save($data);
	}
	
	/**
	  * If confirm_password is set, make sure it matches the passed in password
	  * or return a validation error
	  */
	public function confirmPasswordCheck($check = null){
	  if(isset($this->data[$this->alias]['confirm_password'])){
	    if($this->hashPassword($this->data[$this->alias]['confirm_password']) != $this->data[$this->alias]['password']){
	      return false;
	    }
	  }
	  return true;
	}
	
	public function checkPassword($user_id, $password){
		$official_pass = $this->field('password', array('User.id' => $user_id));
		if($official_pass == $this->hashPassword($password)){
			return true;
		}
		return false;
	}
	
	/**
	* Hash the password.
	* @param string to hash
	* @return string hashed password.
	*/
	function hashPassword($password){
		return Security::hash($password, null, true);
	}
	
	/**
	* Generate a strong random password
	* @param int length
	* @return string strong password
	*/
	function randPass($length = 8){
  	return substr(md5(rand().rand()), 0, $length);
  }
}
