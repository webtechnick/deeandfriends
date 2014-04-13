<?php
App::uses('CharactersService', 'Model');

/**
 * CharactersService Test Case
 *
 */
class CharactersServiceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.characters_service',
		'app.character',
		'app.headshot',
		'app.service'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CharactersService = ClassRegistry::init('CharactersService');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CharactersService);

		parent::tearDown();
	}

}
