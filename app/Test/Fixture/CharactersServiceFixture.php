<?php
/**
 * CharactersServiceFixture
 *
 */
class CharactersServiceFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'character_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'service_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'base_price_dollars_overwrite' => array('type' => 'float', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'character_id' => array('column' => array('character_id', 'service_id'), 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'character_id' => 1,
			'service_id' => 1,
			'base_price_dollars_overwrite' => 1
		),
	);

}
