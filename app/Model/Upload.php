<?php
App::uses('AppModel', 'Model');
/**
 * Upload Model
 *
 * @property Character $Character
 */
class Upload extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
	
	public $actsAs = array('Icing.FileUpload');

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
		)
	);
	
	public $hasOne = array( //headshot
		'Toon' => array(
			'className' => 'Character',
			'foreignKey' => 'headshot_id'
		)
	);
}
