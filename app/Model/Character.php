<?php
App::uses('AppModel', 'Model');
/**
 * Character Model
 *
 * @property Headshot $Headshot
 * @property Service $Service
 */
class Character extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'bio' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Headshot' => array(
			'className' => 'Upload',
			'foreignKey' => 'headshot_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	public $hasMany = array(
		'Upload' => array(
			'className' => 'Upload',
			'foreignKey' => 'character_id',
			//'dependent' => true,
		),
		'CharactersService' => array(
			'className' => 'CharactersService',
			'foreignKey' => 'character_id'
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Service' => array(
			'className' => 'Service',
			'joinTable' => 'characters_services',
			'foreignKey' => 'character_id',
			'associationForeignKey' => 'service_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);
	
	/**
	* Clear out empty files
	*/
	public function beforeValidate($options = array()) {
		//Cleanup HABTM relationship for editing.
		if (!empty($this->data['CharactersService'])) {
			foreach ($this->data['CharactersService'] as $key => $char_service) {
				if (!isset($char_service['service_id']) || $char_service['service_id'] == 0) {
					unset($this->data['CharactersService'][$key]);
				}
			}
		}
		if (empty($this->data['Headshot']['file']['name'])) {
			unset($this->data['Headshot']);
		}
		if (empty($this->data['Upload'][0]['file']['name'])) {
			unset($this->data['Upload']);
		}
		if (empty($this->data['Character']['slug']) && !empty($this->data['Character']['name'])) {
			$this->data['Character']['slug'] = Inflector::slug($this->data['Character']['name'], '-');
		}
		return true;
	}
	
	public function adminSave($data) {
		if (isset($data['CharactersService']) && !empty($data['Character']['id'])) {
			$this->CharactersService->clearForCharacterId($data['Character']['id']);
		}
		return $this->saveAll($data);
	}
	
	public function findAllForIndex() {
		return $this->find('all', array(
			'conditions' => array(
				'Character.is_active' => true,
			),
			'contain' => array('Headshot'),
			'order' => 'Character.name ASC'
		));
	}
	
	public function findForEdit($id) {
		return $this->find('first', array(
			'conditions' => array(
				'Character.id' => $id,
			),
			'contain' => array('Headshot','CharactersService','Service','Upload')
		));
	}
	
	public function findIdBySlug($slug = null) {
		return $this->field('id', array(
			'Character.slug' => $slug,
			'Character.is_active' => true
		));
	}
	
	public function findForNav() {
		return $this->find('list', array(
			'conditions' => array(
				'Character.is_active' => true,
				'Character.slug !=' => '',
			),
			'fields' => array('Character.slug','Character.name')
		));
	}
	
	public function findList() {
		return $this->find('list', array(
			'conditions' => array(
				'Character.is_active' => true,
			),
			'fields' => array('Character.id','Character.name'),
		));
	}
}
