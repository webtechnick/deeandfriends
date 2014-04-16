<?php
App::uses('AppModel', 'Model');
/**
 * CharactersService Model
 *
 * @property Character $Character
 * @property Service $Service
 */
class CharactersService extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'character_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'service_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
		'Character' => array(
			'className' => 'Character',
			'foreignKey' => 'character_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Service' => array(
			'className' => 'Service',
			'foreignKey' => 'service_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	public function clearForCharacterId($character_id = null) {
		return $this->deleteAll(array(
			'OR' => array(
				'CharactersService.character_id' => $character_id,
				'CharactersService.service_id' => 0,
			)
		));
	}
}
